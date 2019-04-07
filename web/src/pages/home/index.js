import React, { Component } from 'react';
import { Layout, Menu, Icon, Affix, List, Avatar } from 'antd';
import { Link } from "react-router-dom";

const {Header,Footer, Sider, Content} = Layout;

const data = [
    {
        title: '三寸人间',
        description:'吾有一口玄黄气，可吞天地日月星。天蚕土豆最新鼎力大作，2017年度必看玄幻小说。'
    },
    {
        title: '三寸人间',
        description:'吾有一口玄黄气，可吞天地日月星。天蚕土豆最新鼎力大作，2017年度必看玄幻小说。'

    },
    {
        title: '三寸人间',
        description:'吾有一口玄黄气，可吞天地日月星。天蚕土豆最新鼎力大作，2017年度必看玄幻小说。'
    },
    {
        title: '三寸人间',
        description:'吾有一口玄黄气，可吞天地日月星。天蚕土豆最新鼎力大作，2017年度必看玄幻小说。'
    }
  ];

class Index extends Component{
    render(){
        return(
            <Layout>
                <Header style={{ background: '#fff', padding: 0 }}>Header</Header>
                <Layout>
                    <Sider  breakpoint="lg"
                            collapsedWidth="0"
                            // onBreakpoint={(broken) => { console.log(broken); }}
                            // onCollapse={(collapsed, type) => { console.log(collapsed, type); }}
                    >
                        <div className="logo" />
                        <Menu theme="dark" mode="inline" defaultSelectedKeys={['4']}>
                            <Menu.Item key="1">
                            <Icon type="user" />
                            <span className="nav-text">nav 1</span>
                            </Menu.Item>
                            <Menu.Item key="2">
                            <Icon type="video-camera" />
                            <span className="nav-text">nav 2</span>
                            </Menu.Item>
                            <Menu.Item key="3">
                            <Icon type="upload" />
                            <span className="nav-text">nav 3</span>
                            </Menu.Item>
                            <Menu.Item key="4">
                            <Icon type="user" />
                            <span className="nav-text">nav 4</span>
                            </Menu.Item>
                        </Menu>
                    </Sider>
                    <Content style={{ margin: '24px 16px 0' }}>
                        <div style={{ padding: 24, background: '#fff', minHeight: 1366 }}>
                        <List
                            itemLayout="horizontal"
                            dataSource={data}
                            renderItem={item => (
                                <Link to='/detail'>
                                <List.Item>
                                        <List.Item.Meta
                                            avatar={<Avatar shape="square" size={81} src="http://www.56shuku.org/files/article/image/35/35206/35206s.jpg" />}
                                            title={item.title}
                                            description={item.description}
                                        />
                                </List.Item>
                                </Link>    
                            )}
                        />,
                        </div>
                    </Content>
                </Layout>
                <Affix offsetBottom={0}>
                    <Footer style={{ textAlign: 'center' }}>
                        Ant Design ©2018 Created by Ant UED
                    </Footer>
                </Affix>      
            </Layout>
        )
    }
}

export default Index;