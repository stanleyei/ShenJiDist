import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import List from './components/List'
import NavBar from './components/NavBar'
import SideBar from './components/SideBar'
import isLoadingGif from '../img/loading-buffering.gif'

export default class BackendPage extends Component {

    state = {
        isLoading: false,
    }

    changeIsLoading = () => {
        // 開關loading頁面
        const { isLoading } = this.state
        this.setState({ isLoading: !isLoading })
    }

    render() {
        const { isLoading } = this.state
        return (
            <div id="wrapper">
                <SideBar />
                <div id="content-wrapper" className="d-flex flex-column">
                    <div id="content">
                        <NavBar />
                        <div className="container-fluid">
                            <List />
                        </div>
                    </div>
                </div>
                {
                    isLoading
                    &&
                    <div style={{
                        position: 'absolute',
                        top: 0,
                        left: 0,
                        height: '100vh',
                        width: '100%',
                        backgroundColor: 'rgba(0, 0, 0, 0.5)',
                        zIndex: 9,
                        display: 'flex',
                        justifyContent: 'center',
                        alignItems: 'center'
                    }}>
                        <img src={isLoadingGif} alt="" />
                    </div>
                }
            </div>
        )
    }
}

ReactDOM.render(<BackendPage />, document.getElementById('react-backendpage'))
