import React from 'react';

export default class Profile extends React.Component {
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

        <div className="page-body">

          <div className="row">
            <div className="col-md-12">
              <div className="profile-container">
                              <div className="profile-header row">
                                  <div className="col-lg-2 col-md-4 col-sm-12 text-center">
                                      <img src="assets/img/avatars/divyia.jpg" alt="" className="header-avatar"/>
                                  </div>
                                  <div className="col-lg-5 col-md-8 col-sm-12 profile-info">
                                      <div className="header-fullname">Kim Ryder</div>
                                      <a href="#" className="btn btn-palegreen btn-sm  btn-follow">
                                          <i className="fa fa-check"></i>
                                          Following
                                      </a>
                                      <div className="header-information">
                                          Kim is a software developer in Microsoft. She works in ASP.NET MVC Team and collaborates with other teams.
                                      </div>
                                  </div>
                                  <div className="col-lg-5 col-md-12 col-sm-12 col-xs-12 profile-stats">
                                      <div className="row">
                                          <div className="col-lg-4 col-md-4 col-sm-4 col-xs-12 stats-col">
                                              <div className="stats-value pink">284</div>
                                              <div className="stats-title">FOLLOWING</div>
                                          </div>
                                          <div className="col-lg-4 col-md-4 col-sm-4 col-xs-12 stats-col">
                                              <div className="stats-value pink">803</div>
                                              <div className="stats-title">FOLLOWERS</div>
                                          </div>
                                          <div className="col-lg-4 col-md-4 col-sm-4 col-xs-12 stats-col">
                                              <div className="stats-value pink">1207</div>
                                              <div className="stats-title">POSTS</div>
                                          </div>
                                      </div>
                                      <div className="row">
                                          <div className="col-lg-4 col-md-4 col-sm-4 col-xs-4 inlinestats-col">
                                              <i className="glyphicon glyphicon-map-marker"></i> Boston
                                          </div>
                                          <div className="col-lg-4 col-md-4 col-sm-4 col-xs-4 inlinestats-col">
                                              Rate: <strong>$250</strong>
                                          </div>
                                          <div className="col-lg-4 col-md-4 col-sm-4 col-xs-4 inlinestats-col">
                                              Age: <strong>24</strong>
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
