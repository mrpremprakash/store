import React from 'react';

export default class Post extends React.Component {
  render() {
    return (
      <div className="page-content">
          <div className="page-breadcrumbs">
            <ul className="breadcrumb">
              <li>
                  <i className="fa fa-home"></i>
                  <a href="javascript:void(0);">Home</a>
              </li>
            </ul>
          </div>
      </div>
    )
  }
}
