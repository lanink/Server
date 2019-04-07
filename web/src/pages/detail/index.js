import React, { Component } from 'react';
import { Layout,Menu, Icon, Affix,Card,Col, Row,Button,Table } from 'antd';
import { Link } from "react-router-dom";

const data = {
    title: '三寸人间',
    author: '耳根',
    description: '举头三尺无神明，掌心三寸是人间。这是耳根继《仙逆》《求魔》《我欲封天》《一念永恒》后，创作的第五部长篇小说《三寸人间》。',
    list: [
        {
            id: 584,
            title: '第584章 联邦来人！',
            time: '2019-04-05 17:50:30'
        },
        {
            id: 583,
            title: '第583章 不一样了！',
            time: '2019-04-05 11:51:38'
        },
        {
            id: 582,
            title: '第582章 第一人！',
            time: '2019-04-04 17:50:48'
        },
        {
            id: 581,
            title: '第581章 拔剑！',
            time: '2019-04-04 11:50:57'
        },
        {
            id: 580,
            title: '第580章 瘦了！！！',
            time: '2019-04-03 17:50:35'
        },
        {
            id: 579,
            title: '第579章 极限',
            time: '2019-04-03 11:50:29'
        },
    ],
};

const {Header,Sider,Content,Footer ,} = Layout;
const { Meta } = Card;
const { Column } = Table;
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
                        <div style={{ padding: 24, background: '#fff', minHeight: 300 }}>
                            <Row gutter={16}>
                                <Col span={10}>
                                    <Card
                                        hoverable
                                        cover={<img alt="example" src="https://os.alipayobjects.com/rmsportal/QBnOOoLaAfKPirc.png" />}
                                    >
                                        <Meta   title="月点击：55912"
                                                description="总推荐数：35"
                                        />
                                    </Card>
                                </Col>
                                <Col span={14}>
                                    <Card title={data.title} bordered={false}>
                                        <Meta   title={data.author}
                                                description={data.description}
                                        />
                                    </Card>
                                </Col>
                            </Row>
                            <hr />
                            <Row gutter={16}>
                                <Col span={8}>
                                    <Link to='/read'>
                                        <Button type='primary'>开始阅读</Button>
                                    </Link>
                                </Col>
                                <Col span={8}>
                                    <Button type='primary'>章节目录</Button>
                                </Col>    
                                <Col span={8}>
                                    <Button type='primary'>加入收藏</Button>
                                </Col>        
                            </Row>
                            <hr />
                            <Row>
                                <Table dataSource={data.list} rowKey='id'>
                                    <Column title="最新章节"
                                            dataIndex="title"
                                            key="id"
                                            render={(title , recode , index) => {
                                                return(
                                                    <Link to='/read'>
                                                        {title}
                                                    </Link>
                                                )
                                            }}
                                    />
                                </Table>,
                            </Row>    
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
