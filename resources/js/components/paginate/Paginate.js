import ReactDOM from 'react-dom';
import React, { Component } from 'react';

export default class Paginate extends Component {
    constructor(props) {

        super(props);

        this.app = props.app;

        this.state = {
            sort: props.page,
            current_page: props.current_page,
            last_page: props.last_page
        };
        this.createLi = this.createLi.bind(this);
        this.clickPaginete = this.clickPaginete.bind(this);
        this.createColLi = this.createColLi.bind(this);
    }

    render() {
        if (this.props.current_page == false || 
            this.props.last_page == false ||
            this.props.last_page == 1) {
            return('');
        }
        return(
            <nav>
                <ul className="pagination">
                    {this.createColLi('prev')}
                    {this.createLi()}
                    {this.createColLi('next')}
                </ul>
            </nav>
        );
    }

    createLi() {
       
        let rows = [];
        const lists = this.props.last_page;
        const curent = this.props.current_page;
        let start = 1;
        let end = 5;
        if (end < lists) {
            if((curent+2) >= end) {
                end = (curent+2)>lists?lists:(curent+2);
            }
            
            if((curent-2) > start) {
                start = (curent-2)>(lists-5)?(lists-4):(curent-2);
            }
        } else {
            end = lists;
        }

        for (let i = start; i <= end; i++) {
            let val = i+'linum_row';
            if (curent == i) {
                rows.push(
                    <li key={val+1} className="active" >
                        <a href="javascript:void(0)">{i}</a>
                    </li>
                );
            } else {
                rows.push(
                    <li key={val} >
                        <a href="javascript:void(0)" 
                        data-link={i}
                        onClick={this.clickPaginete}
                        >{i}</a>
                    </li>
                );
            }
        }
        return rows;
    }

    createColLi(rout) {

        let classD = '',data='',span = '';
        if (rout == 'next') {
            span = '»';
            data = this.props.current_page + 1;
            if (this.props.current_page == this.props.last_page) {
                classD = 'disabled';
                data = 'not';
            }
        } else if(rout == 'prev') {
            span = '«';
            data = this.props.current_page - 1;
            if (this.props.current_page == 1) {
                classD = 'disabled';
                data = 'not';
            }
        }

        return (
            <li className={classD}>
                <a href="javascript:void(0)" 
                    data-link={data}
                    onClick={this.clickPaginete} >
                    {span}
                </a>
            </li>
        );
    }

    clickPaginete (event) {
        event.preventDefault();
        let page = event.target.dataset.link;
        if (!Number.isInteger(Number(page))) {
            return; 
        }
        this.app.setParams({page: page});
    }
}
