import Axios from 'axios'
import React, { Component } from 'react'

export default class Update extends Component {

    updateData = (event) => {
        event.preventDefault()
        // 取得關閉update page的方法
        const { updatePageDown, updateTable } = this.props
        // 取得ref傳來的infoTypeName
        const { infoTypeName: { value: newName } } = this
        // 取得要更新的資料
        const { needUpdateData } = this.props
        // 發出更新的請求
        // 成功後更新資料
        // 關閉更新頁面
        if (newName) {
            Axios.put(`admin/info_types/${needUpdateData.id}`, {
                name: newName,
            }).then(response => {
                // 回傳的資料是新資料，直接丟回上層state
                updateTable(response.data)
                // 關閉編輯頁
                updatePageDown()
            })
        }
    }

    render() {
        const { updatePageDown, needUpdateData } = this.props
        return (
            <div className="container">
                <h1 className="display-3 text-center">編輯</h1>
                <form action="" method="POST" encType="multipart/form-data">
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="name">名稱</label>
                        <input ref={c => this.infoTypeName = c} defaultValue={needUpdateData.name} className="form-control" id="name" name="name" type="text" />
                    </div>
                    <button className="btn btn-secondary" onClick={updatePageDown}>取消</button>
                    <button onClick={this.updateData} className="btn btn-primary">編輯</button>
                </form>
            </div>
        )
    }
}
