import React, { Component } from 'react';
import { BrowserRouter as Router, Route } from "react-router-dom";
import Home from './pages/home';
import Detail from './pages/detail';
import Read from './pages/read';

class App extends Component {
    render() {
    return (
        <Router>
          <Route exact path="/" component={Home} />
          <Route path="/detail" component={Detail} />
          <Route path="/read" component={Read} />
        </Router>
    );
  }
}

export default App;
