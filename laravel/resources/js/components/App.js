import React from 'react';
import { Router, Route, Switch } from 'react-router-dom';

import history from '../history';

import Header from './Header';
import Home from './Home';
import UserProfile from './users/UserProfile';

const App = () => {
  return (
    <Router history={history}>
      <Header />
      <div className="ui container">
        <Switch>
          <Route path="/profile" exact component={UserProfile} />
          <Route path="/upload" exact component={UserProfile} />
          <Route path="*" component={Home} />
        </Switch>
      </div>
    </Router>
  );
}

export default App;