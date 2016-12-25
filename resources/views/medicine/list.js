import React from 'react';

export default class MedicineList extends React.Component {
  constructor(props) {
    super(props);

  };
  render() {
    var self = this;
    return (
      <div className="page-content">
          <div className="page-breadcrumbs">
            <ul className="breadcrumb">
              <li>
                  <i className="fa fa-home"></i>
                  <a href="#">Home</a>
              </li>
              <li className="active">Medicine / List</li>
            </ul>
          </div>

          <div className="page-body">
            <div className="row">
              <div className="col-xs-12 col-md-12">
                <div className="widget">
                  <div className="widget-header">
                    <span className="widget-caption">Medicine List</span>
                    <div className="widget-buttons">
                        <a href="#" data-toggle="maximize">
                            <i className="fa fa-expand"></i>
                        </a>
                        <a href="#" data-toggle="collapse">
                            <i className="fa fa-minus"></i>
                        </a>
                        <a href="#" data-toggle="dispose">
                            <i className="fa fa-times"></i>
                        </a>
                    </div>
                  </div>

                  <div className="widget-body">
                  <div id="editabledatatable_wrapper" className="dataTables_wrapper form-inline no-footer">
                    <table className="table table-striped table-hover table-bordered dataTable no-footer">
                    <thead>
                          <tr role="row">
                            <th className="sorting" style={{width: '172px'}}>ID</th>
                            <th className="sorting_asc" style={{width: '162px'}}>Username</th>
                            <th className="sorting" style={{width: '244px'}}>Full Name</th>
                            <th className="sorting" style={{width: '172px'}}>Email</th>
                            <th className="sorting_disabled" style={{width: '285px'}}></th>
                          </tr>
                      </thead>

                      <tbody>
                      {
                        this.props.container.state.items.map(function(item, index) {
                          return (
                            <tr role="row" className="odd" key={index}>
                                <td>{item.id}</td>
                                <td className="sorting_1">{item.username}</td>
                                <td>{item.name}</td>
                                <td className="center ">{item.email}</td>
                                <td>
                                    <a href="#" className="btn btn-info btn-xs edit"><i className="fa fa-edit"></i> Edit</a>
                                    <a href="#" className="btn btn-danger btn-xs delete"><i className="fa fa-trash-o"></i> Delete</a>
                                </td>
                            </tr>
                          )
                        })
                      }
                    </tbody>
                  </table>
                  <div className="row DTTTFooter">
                    <div className="col-sm-6">
                      <div className="dataTables_info" id="editabledatatable_info" role="status" aria-live="polite">Showing 1 to 5 of 6 entries</div>
                    </div>
                    <div className="col-sm-6">
                      <div className="dataTables_paginate paging_bootstrap" id="editabledatatable_paginate">
                        <ul className="pagination">
                          <li className="prev disabled">
                            <a href="#">Prev</a>
                          </li>
                          <li className="active">
                            <a href="#">1</a>
                          </li>
                          <li>
                            <a href="#">2</a>
                          </li>
                          <li className="next">
                            <a href="#">Next</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    )
  }
}
