import React from 'react';
import { NavLink, Link } from 'react-router-dom';

const Header = () => {
  return (
    <div className="ui menu">
      <div className="header item">
        <img src="/img/logo.png" className="logo" />
      </div>
      <NavLink to="/home" className="item" activeClassName="active">Browse</NavLink>
      <NavLink to="/upload" className="item" activeClassName="active">Upload your photoes!</NavLink>

      <div className="right menu">
        <NavLink to="/profile" className="item" activeClassName="active">User Profile</NavLink>
      </div>
    </div>
  );
}

export default Header;