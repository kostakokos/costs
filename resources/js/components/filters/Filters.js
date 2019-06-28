import ReactDOM from 'react-dom';
import React, { Component } from 'react';
import DatePicker from "react-datepicker";
import "react-datepicker/dist/react-datepicker.css";


export default class Filters extends Component {

    constructor(props) {
        super(props);

        this.app = props.app;

        this.state = { 
            count: '',
            date: '',
            type: '',
            id: '',
            amount: '',
            dateSet: '',
        };
        
        this.handleChange = this.handleChange.bind(this);
        this.handleEvents = this.handleEvents.bind(this);
        this.changeBtn = this.changeBtn.bind(this);
    }

    render() {
        const types = this.props.type;
        return (
            <div className="row" >
                    <div className="col-xs-6 account-left">
                        <input type="text" name="id" placeholder={"ID"} onChange={this.handleEvents} />
                        <input type="text" name="amount" placeholder={"Amount"} onChange={this.handleEvents} />
                        <DatePicker 
                            onChange={this.handleChange} 
                            placeholderText="Click to select a date"
                            selected={this.state.date} 
                            dateFormat="yyyy-MM-dd" 
                            name="date"
                        />
                    </div>
                    <div className="col-xs-6 account-left">
                        <select name="count" 
                            onChange={this.handleEvents} 
                        >
                            <option >Number of lines per page</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                        </select>
                        <select name="type"
                            onChange={this.handleEvents}
                        >
                            {this.ctreateTypSelect(types)}
                        </select>
                        <div className="address">
                            <input type="submit" value="Filter"
                                onClick={this.changeBtn}
                            />
                        </div>
                    </div>
            </div>
        );
    }
    
    ctreateTypSelect(types) {
        let rows = [];
        let list = [];
        if (types !== false) {list = types}
        this.state.typeList;
        rows.push(<option key={'type-all'} value='' >All types</option>);
        for (let i = 0; i < list.length; i++) {
            let val = i+'type_row';
            rows.push(<option key={val} value={list[i].id}>{list[i].name}</option>);
        }
        return rows;
    }

    handleEvents(data) {
        this.setState({
            [data.target.name]: data.target.value
        });
    }

    changeBtn(data){
        let obj = {};
        obj.date = this.state.dateSet;
        obj.count = this.state.count ;
        obj.amount = this.state.amount ;
        obj.type = this.state.type ;
        obj.id = this.state.id ;
        obj.page = 1;
        this.app.setParams(obj);
    }

    handleChange(date) {
        const dates = this.formatDate(new Date(date));
        this.setState({
            date: date,
            dateSet: dates
        });
    }

    formatDate(date) {

        let dd = date.getDate();
        if (dd < 10) dd = '0' + dd;

        let mm = date.getMonth() + 1;
        if (mm < 10) mm = '0' + mm;

        let yy = date.getFullYear();
        
        return yy + '-' + mm + '-' + dd;
    }

}
// 