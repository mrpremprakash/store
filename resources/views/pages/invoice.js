import React from 'react';

export default class Invoice extends React.Component {
  render() {
    return (
      <div className="page-content">
        <div className="page-breadcrumbs">
          <ul className="breadcrumb">
            <li>
                <i className="fa fa-folder-open"></i>
                <a href="javascript:void(0);">Invoice</a>
            </li>
          </ul>
        </div>

        <div className="page-body">
          <div className="row"></div>
        </div>
      </div>
    )
  }
}
