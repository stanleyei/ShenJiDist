import Axios from 'axios'
import { nanoid } from 'nanoid'
import React, { Component } from 'react'
import ReactRouter from 'react-router-dom'

export default class List extends Component {

    state = {
        currentPage: '',
        pageContactType: { dataPath: '/admin/contact_data', dataColumnName: [] },
        pageContactContentType: { dataPath: '/admin/contact_data', dataColumnName: [] },
        pageContact: {
            dataPath: '/admin/contact_data',
            dataColumnName: [
                { id: 1, name: '類型' },
                { id: 2, name: '發送者' },
                { id: 3, name: '郵件地址' },
                { id: 4, name: '內容' },
                { id: 5, name: '編輯' },
                { id: 6, name: '刪除' },
            ],
            dataColumn: []
        },
    }

    test = () => {
        const { pageContact } = this.state
        this.setState({ currentPage: pageContact })
    }

    componentDidMount() {
        // 頁面render完後使用DataTable
        const dataTable = $('#ajaxdata').DataTable();


        // 取得當下頁面資料
        const { currentPage } = this.state
        const dataPath = currentPage.dataPath
        Axios.post(dataPath).then(
            response => {
                console.log(123);
                this.setState({ currentPage: { ...currentPage, dataColumn: response.data.data } })
            },
            error => {
                console.log(error);
            }
        )
    }

    componentDidUpdate() {
        // 頁面render完後使用DataTable
        const dataTable = $('#ajaxdata').DataTable();


        // 取得當下頁面資料
        const { currentPage } = this.state
        const dataPath = currentPage.dataPath
        Axios.post(dataPath).then(
            response => {
                if (currentPage.dataColumn && currentPage.dataColumn.length !== [response.data.data].length) {
                    console.log(currentPage.dataColumn.length);
                    console.log([response.data.data].length);
                    this.setState({ currentPage: { ...currentPage, dataColumn: [response.data.data] } })
                }
            },
            error => {
                console.log(error);
            }
        )
    }

    render() {
        const { currentPage } = this.state
        return (
            currentPage
                ?
                <div className="container">
                    <a href="#"><button className="btn btn-success">新增</button></a>
                    <hr />
                    <table id="ajaxdata" className="table table-striped table-bordered" style={{ width: '100%' }}>
                        <thead>
                            <tr>
                                {currentPage.dataColumnName.map(info_type => <th key={info_type.id}>{info_type.name}</th>)}
                            </tr>
                        </thead>
                        <tbody>
                            {
                                currentPage.dataColumn !== {}
                                &&
                                currentPage.dataColumn.map(data => {
                                    <tr key={data.id}>
                                        <td>{data.id}</td>
                                        <td>{data.id}</td>
                                        <td>{data.id}</td>
                                        <td>{data.id}</td>
                                        <td>{data.id}</td>
                                        <td>{data.id}</td>
                                    </tr>
                                })
                            }
                        </tbody>
                    </table>
                </div>
                :
                <div>
                    <button onClick={this.test}>換頁</button>
                </div>
        )
    }
}
