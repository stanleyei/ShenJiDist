import React, { Component } from 'react'

export default class SideBar extends Component {

    render() {
        return (
            <ul className="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <a className="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
                    <div className="sidebar-brand-icon rotate-n-15">
                        <i className="fas fa-laugh-wink"></i>
                    </div>
                    <div className="sidebar-brand-text mx-3">審計新村走九遍</div>
                </a>

                <hr className="sidebar-divider my-0" />

                <hr className="sidebar-divider" />

                <li className="nav-item">
                    <a className="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-column-info"
                        aria-expanded="true" aria-controls="collapse-column-info">
                        <i className="fas fa-fw fa-cog"></i>
                        <span>資訊</span>
                    </a>
                    <div id="collapse-column-info" className="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div className="bg-white py-2 collapse-inner rounded">
                            <h6 className="collapse-header">INFO:</h6>
                            <a className="collapse-item" href="#">資訊類型</a>
                            <a className="collapse-item" href="#">資訊列表</a>
                            <a className="collapse-item" href="#">資訊圖片</a>
                        </div>
                    </div>
                </li>

                <li className="nav-item">
                    <a className="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-column-shop"
                        aria-expanded="true" aria-controls="collapse-column-shop">
                        <i className="fas fa-fw fa-wrench"></i>
                        <span>店家</span>
                    </a>
                    <div id="collapse-column-shop" className="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div className="bg-white py-2 collapse-inner rounded">
                            <h6 className="collapse-header">SHOP:</h6>
                            <a className="collapse-item" href="#">店家類型</a>
                            <a className="collapse-item" href="#">店家列表</a>
                            <a className="collapse-item" href="#">店家圖片</a>
                        </div>
                    </div>
                </li>

                <li className="nav-item">
                    <a className="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-column-slider"
                        aria-expanded="true" aria-controls="collapse-column-slider">
                        <i className="fas fa-fw fa-wrench"></i>
                        <span>Slider</span>
                    </a>
                    <div id="collapse-column-slider" className="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div className="bg-white py-2 collapse-inner rounded">
                            <h6 className="collapse-header">SLIDER:</h6>
                            <a className="collapse-item" href="#">Slider</a>
                        </div>
                    </div>
                </li>

                <li className="nav-item">
                    <a className="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-column-view"
                        aria-expanded="true" aria-controls="collapse-column-view">
                        <i className="fas fa-fw fa-wrench"></i>
                        <span>景點</span>
                    </a>
                    <div id="collapse-column-view" className="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div className="bg-white py-2 collapse-inner rounded">
                            <h6 className="collapse-header">VIEW:</h6>
                            <a className="collapse-item" href="#">景點列表</a>
                            <a className="collapse-item" href="#">景點圖片</a>
                        </div>
                    </div>
                </li>

                <li className="nav-item">
                    <a className="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-column-contact"
                        aria-expanded="true" aria-controls="collapse-column-contact">
                        <i className="fas fa-fw fa-wrench"></i>
                        <span>連絡資料</span>
                    </a>
                    <div id="collapse-column-contact" className="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div className="bg-white py-2 collapse-inner rounded">
                            <h6 className="collapse-header">CONTACT:</h6>
                            <a className="collapse-item" href="#">連絡類型</a>
                            <a className="collapse-item" href="#">連絡內容類型</a>
                            <a className="collapse-item" href="#">連絡內容</a>
                        </div>
                    </div>
                </li>

                <hr className="sidebar-divider" />

                <div className="text-center d-none d-md-inline">
                    <button className="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
        )
    }
}
