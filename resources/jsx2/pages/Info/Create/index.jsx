import Axios from 'axios'
import React, { Component } from 'react'
import Cropper from '../../../js/cropper.js'

export default class Create extends Component {
    constructor(props) {
        super(props);

        this.state = {
            // 避免一開始render 使用map時錯誤，先設定[]
            upperRelation: [],
            ratioName: 'ratio43',
            cropper: false,
            cropperArgs: {
                aspectRatio: 4 / 3,
                viewMode: 3,
                preview: '.preview'
            },
            canvasSize: {
                width: 800,
                height: 600,
            }
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

    createNewData = async (event) => {
        // 避免button預設事件
        event.preventDefault()
        // 取得關閉新增頁、更新table的方法
        const { createPageDown, updateTable } = this.props
        // 取得input value
        const {
            infoTypeId: { value: inputTypeinfoTypeId },
            infoName: { value: inputName },
            // infoContent: { value: inputContent },
            infoDateStart: { value: inputDateStart },
            infoDateEnd: { value: inputDateEnd },
            infoLocation: { value: inputLocation },
            infoOrganizer: { value: inputOrganizer },
            infoCalendar: { value: inputCalendar },
        } = this

        const inputContent = $('.textarea').summernote('code');

        // 取得圖片檔案
        await this.getCanvas();
        const inputImg = this.cropImg

        let formData = new FormData()
        formData.append('type_id', inputTypeinfoTypeId)
        formData.append('name', inputName)
        formData.append('content', inputContent)
        formData.append('img', inputImg)
        formData.append('date_start', inputDateStart)
        formData.append('date_end', inputDateEnd)
        formData.append('location', inputLocation)
        formData.append('organizer', inputOrganizer)
        formData.append('calendar', inputCalendar)

        // 判斷是否都存在，目前是全部都必填，新增按鈕才有效
        const checkExist = inputTypeinfoTypeId && inputName && inputContent && inputImg && inputDateStart && inputDateEnd && inputLocation && inputOrganizer && inputCalendar
        // request 後端新增資料
        if (checkExist) {
            // 不同頁面要不同路徑
            Axios.post('admin/info', formData).then(response => {
                // 回傳的資料是新資料，直接丟回上層state
                updateTable(response.data)
                // 關閉新增頁
                createPageDown()
            })
        }
    }

    handleRatio = (e, name) => {
        e.preventDefault()

        const { cropper } = this.state

        this.setState({ ratioName: name })
        if (name === 'ratio169') {
            cropper.setAspectRatio(16 / 9)
        } else if (name === 'ratio43') {
            cropper.setAspectRatio(4 / 3)
        }
    }

    handleImgChange = (params) => {
        const { cropperArgs } = this.state

        let cropper = this.state.cropper
        if (cropper) {
            cropper.destroy()
        }
        let image = document.getElementById('image');
        let reader, file;

        const files = params.target.files;
        const done = url => image.src = url

        if (files && files.length > 0) {
            file = files[0];

            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = (e) => {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }

            this.setState({ cropper: new Cropper(image, cropperArgs) })

        }

    }

    getCanvas = (params) => {

        return new Promise(resolve => {
            const { cropper, canvasSize } = this.state
            if (cropper) {
                let canvas = cropper.getCroppedCanvas(canvasSize);
                if (canvas !== null) {
                    canvas.toBlob((blob) => {
                        this.cropImg = new File([blob], "img");
                        resolve()
                    });
                }
            }
        })
    }

    componentDidUpdate() {
        // summernote
        $('.textarea').summernote({
            width: '100%',
            height: 200,
        });

    }

    render() {
        const { createPageDown } = this.props
        const { upperRelation, cropper, ratioName } = this.state
        return (
            <div className="container">
                <h1 className="display-3 text-center">新增</h1>
                <form action="" method="POST" encType="multipart/form-data">
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="type_id">類型</label>
                        <select ref={c => this.infoTypeId = c} className="form-control" name="type_id" id="type_id">
                            {
                                upperRelation.map((data) => {
                                    return (
                                        <option key={data.id} value={data.id}>{data.name}</option>
                                    )
                                })
                            }
                        </select>
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="name">名稱</label>
                        <input ref={c => this.infoName = c} className="form-control" id="name" name="name" type="text" />
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="content">內容</label>
                        <textarea ref={c => this.infoContent = c} className="form-control textarea" id="content" name="content" cols="30" rows="10"></textarea>
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="img">圖片</label>
                        <input onChange={this.handleImgChange} className="form-control image" id="img" name="img" type="file" accept="image/*" />
                    </div>

                    <div className="img-container">
                        <div className="row">
                            <div className="col-md-8">
                                <img style={{ maxWidth: '100%', display: 'block' }} id="image" />
                            </div>
                            {
                                cropper &&
                                <div className="col-md-3 offset-1">
                                    <div className="preview" style={{ overflow: 'hidden', height: 200 }}>
                                    </div>

                                    <div>
                                        <button onClick={(e) => { this.handleRatio(e, 'ratio43') }} className={ratioName === 'ratio43' ? 'btn btn-success active' : 'btn btn-success'}>4 : 3</button>&nbsp;
                                        <button onClick={(e) => { this.handleRatio(e, 'ratio169') }} className={ratioName === 'ratio169' ? 'btn btn-success active' : 'btn btn-success'}>16 : 9</button>
                                    </div>
                                </div>
                            }
                        </div>
                    </div>

                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="date_start">開始日期</label>
                        <input ref={c => this.infoDateStart = c} className="form-control" id="date_start" name="date_start" type="date" />
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="date_end">結束日期</label>
                        <input ref={c => this.infoDateEnd = c} className="form-control" id="date_end" name="date_end" type="date" />
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="location">地點</label>
                        <input ref={c => this.infoLocation = c} className="form-control" id="location" name="location" type="text" />
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="organizer">主辦單位</label>
                        <input ref={c => this.infoOrganizer = c} className="form-control" id="organizer" name="organizer" type="text" />
                    </div>
                    <div className="form-group row">
                        <label className="col-sm-2 col-form-label" htmlFor="calendar">日曆</label>
                        <input ref={c => this.infoCalendar = c} className="form-control" id="calendar" name="calendar" type="text" />
                    </div>
                    <button className="btn btn-secondary" onClick={createPageDown}>取消</button>
                    <button onClick={this.createNewData} className="btn btn-primary">新增</button>
                </form>

            </div>
        )
    }
}
