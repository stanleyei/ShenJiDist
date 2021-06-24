import React, { Component } from 'react'
import Create from './Create'
import Update from './Update'
import store from '../../redux/store'

export default class Slider extends Component {
    constructor(props) {
        super(props);

        this.state = {
            tableData: [],
            isCreate: false,
            isUpdate: false,
            needUpdateData: ''
        };

        // 不同頁面要不同路徑
        axios.post("/admin/slider_data").then(
            response => {
                this.setState({ tableData: response.data })
            }
        )
    }

    // redux開關讀取畫面，目前先不開讀取畫面
    loadingDown = () => {
        store.dispatch({ type: 'down', data: false })
    }
    loadingUp = () => {
        store.dispatch({ type: 'up', data: true })
    }

    createPageUp = () => {
        // 狀態提升用的method，開啟新增頁面
        this.setState({ isCreate: true })
    }

    createPageDown = () => {
        // 狀態提升用的method，關閉新增頁面
        this.setState({ isCreate: false })
    }

    updatePageUp = (id) => {
        // 狀態提升用的method，開啟編輯頁面
        // 取得table資料
        const { tableData } = this.state
        // 取得要編輯的該筆資料
        const updateData = tableData.find(e => id == e.id)
        // 將資料寫進state用props傳給update component，開啟編輯頁面
        this.setState({ needUpdateData: updateData, isUpdate: true })
    }

    updatePageDown = () => {
        // 狀態提升用的method，關閉編輯頁面
        this.setState({ isUpdate: false })
    }

    destroyBtnFunction = (id, name) => {
        if (confirm(`是否要刪除 : ${name}`)) {
            // 不同頁面要不同路徑
            const path = `/admin/slider/${id}`
            axios.delete(path).then(
                response => {
                    this.updateTable(response.data)
                },
                error => {
                    console.log('失敗了');
                }
            )
        }
    }

    updateTable = (returnData = false) => {
        // 沒傳新資料就發post取資料(較慢)
        if (returnData) {
            this.setState({ tableData: returnData })
        } else {
            // 不同頁面要不同路徑
            axios.post("/admin/slider_data").then(
                response => {
                    this.setState({ tableData: response.data })
                }
            )
        }
    }

    componentDidUpdate() {
        $('#ajaxdata').DataTable();
    }

    render() {
        const { tableData, isCreate, isUpdate, needUpdateData } = this.state
        return (
            isCreate
                ?
                <Create createPageDown={this.createPageDown} updateTable={this.updateTable} />
                :
                isUpdate
                    ?
                    <Update updatePageDown={this.updatePageDown} updateTable={this.updateTable} needUpdateData={needUpdateData} />
                    :
                    <div className="container">
                        <h1 className="display-3 text-center">Slider</h1>
                        <button className="btn btn-success" onClick={this.createPageUp}>新增</button>
                        <hr />
                        <table id="ajaxdata" className="table table-striped table-bordered" style={{ width: "100%" }}>
                            <thead>
                                <tr>
                                    <th>名稱</th>
                                    <th>圖片</th>
                                    <th>內容</th>
                                    <th>編輯</th>
                                    <th>刪除</th>
                                </tr>
                            </thead>
                            <tbody>
                                {tableData !== []
                                    &&
                                    tableData.map(data => {
                                        return (
                                            <tr key={data.id}>
                                                <td>{data.name}</td>
                                                <td><div className="pre-img-div" style={{ backgroundImage: `url(${data.img})` }}></div></td>
                                                <td>{data.content}</td>
                                                <td><button className="btn btn-primary" onClick={(e) => this.updatePageUp(data.id)}>編輯</button></td>
                                                <td><button className="btn btn-danger" onClick={(e) => this.destroyBtnFunction(data.id, data.name)}>刪除</button></td>
                                            </tr>
                                        )
                                    })
                                }
                            </tbody>
                        </table>
                    </div>
        )
    }
}
