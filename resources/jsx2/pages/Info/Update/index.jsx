import Axios from 'axios'
import React, { Component } from 'react'

export default class Update extends Component {
    constructor(props) {
        super(props);

        const { type_id, name, content, img, date_start, date_end, location, organizer, calendar } = this.props.needUpdateData
        // console.log(this.props.needUpdateData);

        this.state = {
            // 避免一開始render 使用map時錯誤，先設定[]
            upperRelation: [],
            type_id,
            name,
            content,
            img,
            date_start,
            date_end,
            location,
            organizer,
            calendar,
        };

        // 新增頁面有上層關連的需要取得上層所有選項
        // 在controller新增取得此筆資料的method
        // 寫一固定路徑，依照傳過去的upperName回傳對應的上層資料
        axios.post("/admin/upper_data", {
            // 在此輸入需要的上層名稱
            upperName: 'info_types'
        }).then(
            response => {
                // 將回傳的上層關連存入state
                this.setState({ upperRelation: response.data })
            }
        )
    }

    updateData = (event) => {
        event.preventDefault()
        // console.log(event);
        // 取得關閉update page的方法
        const { updatePageDown, updateTable } = this.props
        // 取得存在state的input value
        const {
            type_id,
            name,
            img,
            date_start,
            date_end,
            location,
            organizer,
            calendar,
        } = this.state

        const content = $('.textarea').summernote('code');

        let newData = new FormData()
        // PUT方法搞了我一整天，最後選擇用POST假裝PUT...
        newData.append('_method', 'put')
        newData.append('type_id', type_id)
        newData.append('name', name)
        newData.append('content', content)
        newData.append('img', img)
        newData.append('date_start', date_start)
        newData.append('date_end', date_end)
        newData.append('location', location)
        newData.append('organizer', organizer)
        newData.append('calendar', calendar)

        // 取得要更新的資料
        const { needUpdateData } = this.props
        // 發出更新的請求
        // 成功後更新資料
        // 關閉更新頁面
        if (true) {
            Axios.post(`admin/info/${needUpdateData.id}`, newData)
                .then(response => {
                    // console.log(response.data);
                    // 回傳的資料是新資料，直接丟回上層state
                    updateTable(response.data)
                    // 關閉編輯頁
                    updatePageDown()
                })
        }

    }

    handleValue = (e, stateName) => {
        // 在這裡處理input value的變動
        if (e.target.files !== null && e.target.files !== undefined) {
            this.setState({ [stateName]: e.target.files[0] })
        } else {
            this.setState({ [stateName]: e.target.value })
        }
    }

    componentDidUpdate() {
        $('.textarea').summernote({
            width: '100%',
            height: 200,
        });
    }

    render() {
        const { updatePageDown, needUpdateData } = this.props
        const { upperRelation, type_id, name, content, img, date_start, date_end, location, organizer, calendar } = this.state
        // console.log(needUpdateData.info_type.id);
        return (
            <div className="container">
                <h1 className="display-3 text-center">編輯</h1>
                <form action="" method="POST" encType="multipart/form-data">
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="type_id">類型</label>
                        <select value={type_id} onChange={(c) => this.handleValue(c, 'type_id')} className="form-control" name="type_id" id="type_id">
                            {
                                upperRelation.map((data) => {
                                    return (
                                        <option key={data.id} value={data.id} >{data.name}</option>
                                    )
                                })
                            }
                        </select>
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="name">名稱</label>
                        <input value={name} onChange={(c) => this.handleValue(c, 'name')} className="form-control" id="name" name="name" type="text" />
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="content">內容</label>
                        <textarea value={content} onChange={(c) => this.handleValue(c, 'content')} className="form-control textarea" id="content" name="content" cols="30" rows="10"></textarea>
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="img">圖片</label>
                        <input onChange={(c) => this.handleValue(c, 'img')} className="form-control" id="img" name="img" type="file" accept="image/*" />
                        <div className="pre-img-div" style={{ backgroundImage: `url(${needUpdateData.img})` }}></div>
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="date_start">開始日期</label>
                        <input value={date_start} onChange={(c) => this.handleValue(c, 'date_start')} className="form-control" id="date_start" name="date_start" type="date" />
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="date_end">結束日期</label>
                        <input value={date_end} onChange={(c) => this.handleValue(c, 'date_end')} className="form-control" id="date_end" name="date_end" type="date" />
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="location">地點</label>
                        <input value={location} onChange={(c) => this.handleValue(c, 'location')} className="form-control" id="location" name="location" type="text" />
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="organizer">主辦單位</label>
                        <input value={organizer} onChange={(c) => this.handleValue(c, 'organizer')} className="form-control" id="organizer" name="organizer" type="text" />
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="calendar">日曆</label>
                        <input value={calendar} onChange={(c) => this.handleValue(c, 'calendar')} className="form-control" id="calendar" name="calendar" type="text" />
                    </div>
                    <button className="btn btn-secondary" onClick={updatePageDown}>取消</button>
                    <button onClick={this.updateData} className="btn btn-primary">編輯</button>
                </form>
            </div>
        )
    }
}
