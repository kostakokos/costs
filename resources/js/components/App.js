import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Filters from './filters/Filters';
import Table from './table/Table';
import Paginate from './paginate/Paginate';


export default class App extends Component {

    constructor(props) {
        super(props);
        this.state = {
            listTable: false,
            type: [],
            current_page: false,
            last_page: false
        };

        this.conf = { 
            sort:'id-asc',
            page: 1
        };
    }

    componentDidMount() {
        this.sendRquest();
    }

    render() {
        return (
            <div className="container">
                <Filters
                    app = {this}
                    type = {this.state.type}
                />
                <Table
                    app = {this}
                    list = {this.state.listTable}
                    sort = {this.conf.sort}
                />
                <Paginate 
                    app = {this}
                    page = {this.conf.page}
                    current_page = {this.state.current_page}
                    last_page = {this.state.last_page}
                />
            </div>
        );
    }

    setParams(obj) {
        this.conf = Object.assign(this.conf, obj);
        this.sendRquest();
    }

    sendRquest() {
        let url = this.generateUrl();
        fetch(url)
            .then(res => res.json())
            .then(
                (result) => { 
                    //console.log(result);
                    this.setState({
                        type: result[0],
                        listTable: result[1].data,
                        current_page: result[1].current_page,
                        last_page: result[1].last_page
                    });
                }, (error) => {
                    this.setState({
                        //isLoaded: true,
                });
            })
    }

    generateUrl() {
        let params = '',
        url = '\/list',
        i = 0;
        for (let key in this.conf) {
            if(this.conf[key] !== '') {
                if (i) {params += '&'} else {params += '?'}
                params += key+'='+this.conf[key];
                i++;
            }
        }

        if (params !== '') {
            url += params;
        }
        return url;
    }

    delElement(id) {
        fetch(('/del?id='+id))
            .then(res => res.json())
            .then((result) => {this.sendRquest()});
    }


}


if (document.getElementById('search-costs')) {
    ReactDOM.render(<App />, document.getElementById('search-costs'));
}
