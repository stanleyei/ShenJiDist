import Axios from 'axios'
import React, { Component } from 'react'

export default class Create extends Component {

    createNewData = (event) => {
        // 避免button預設事件
        event.preventDefault()
        // 取得關閉新增頁、更新table的方法
        const { createPageDown, updateTable } = this.props
        // 取得input value
        const { infoTypeName: { value: inputName } } = this
        // request 後端新增資料
        if (inputName) {
            Axios.post('admin/info_types', {
                name: inputName,
            }).then(response => {
                // 回傳的資料是新資料，直接丟回上層state
                updateTable(response.data)
                // 關閉新增頁
                createPageDown()
            })
        }
    }

    render() {
        const { createPageDown } = this.props
        return (
            <div className="container">
            <h1 className="display-3 text-center">新增</h1>
                <form action="" method="POST" encType="multipart/form-data">
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="name">名稱</label>
                        <input ref={c => this.infoTypeName = c} className="form-control" id="name" name="name" type="text" />
                    </div>
                    <button className="btn btn-secondary" onClick={createPageDown}>取消</button>
                    <button onClick={this.createNewData} className="btn btn-primary">新增</button>
                </form>
            </div>
        )
    }
}
