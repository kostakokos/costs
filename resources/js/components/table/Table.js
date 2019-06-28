import ReactDOM from 'react-dom';
import React, { Component } from 'react';

export default class Table extends Component {

    constructor(props) {

        super(props);

        this.app = props.app;

        this.state = {
            sort: props.sort,
        };
        this.sortList = this.sortList.bind(this);
        this.sortIcon = this.sortIcon.bind(this);
        this.deliteElement = this.deliteElement.bind(this);
    }

    render() {
        let list = this.props.list;
        return (
            <div className="row">
                <div className="col-sm-12">
                    <table className="table table-bordered">
                        <thead>
                            <tr>
                                <th style={{width: "80px"}} >
                                    <a href="#" onClick={this.sortList} data-a='id' >ID</a>&nbsp;
                                    {this.sortIcon('id')}
                                </th>
                                <th >
                                    <a href="#" onClick={this.sortList} data-a='type'>Type</a>&nbsp;
                                    {this.sortIcon('type')}
                                </th>
                                <th style={{width: "100px"}} >
                                    <a href="#" onClick={this.sortList} data-a='amount'>Amount</a>&nbsp;
                                    {this.sortIcon('amount')}
                                </th>
                                <th >Description</th>
                                <th style={{width: "160px"}} >Data</th>
                                <th style={{width: "50px"}} >Delite</th>
                            </tr>
                        </thead>
                        <tbody  >
                            {
                                this.createRow(list)
                            }                           
                        </tbody>
                    </table>
                </div>
            </div>
        );
    }

    deliteElement(event) {
        let del = event.target.dataset.del;
        if (confirm('Confirm the deletion')) {
            this.app.delElement(del);
        }
    }

    sortList(event) {
        event.preventDefault();
        let sort = event.target.dataset.a+'-asc';
        
        if(this.props.sort == sort) {
            sort = event.target.dataset.a+'-desc';
        }
        this.app.setParams({sort: sort,page: 1});
    }

    sortIcon(ico) {
        let desc = <span className="glyphicon glyphicon-sort-by-alphabet-alt" ></span>,
        asc = <span className="glyphicon glyphicon-sort-by-alphabet" ></span>;

        if((ico+'-asc') == this.props.sort) {
            return asc;
        }

        if((ico+'-desc') == this.props.sort) {
            return desc;
        }
    }

    createRow(lists) {
        let rows = [];
        let list = [];
        if(lists !== false){
            list = lists;
        }
        for (let i = 0; i < list.length; i++) {
            let val = i+'table_row';
            rows.push(
                <tr key={val} >
                    <td>{list[i].id}</td>
                    <td>{list[i].type_costs.name}</td>
                    <td>{list[i].amount}</td>
                    <td>{list[i].description}</td>
                    <td>{list[i].created_at}</td>
                    <td>
                        <span onClick={this.deliteElement}
                            data-del={list[i].id}
                            className="glyphicon glyphicon-trash"></span>
                    </td>

                </tr>
            );
        }
        return rows;
    }
}