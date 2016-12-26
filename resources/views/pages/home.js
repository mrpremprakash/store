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

          <div className="page-body">

            <div className="row">
                <div className="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div className="row">
                        <div className="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div className="databox bg-white radius-bordered">
                                <div className="databox-left bg-themesecondary">
                                    <div className="databox-piechart">
                                        <div data-toggle="easypiechart" className="easyPieChart" data-barcolor="#fff" data-linecap="butt" data-percent="50" data-animate="500" data-linewidth="3" data-size="47" data-trackcolor="rgba(255,255,255,0.1)" style={{width: '47px', height: '47px', lineHeight: '47px'}}><span className="white font-90">50%</span><canvas width="47" height="47"></canvas></div>
                                    </div>
                                </div>
                                <div className="databox-right">
                                    <span className="databox-number themesecondary">28 medicines</span>
                                    <div className="databox-text darkgray">Will Expiry in 10 days</div>
                                    <div className="databox-stat themesecondary radius-bordered">
                                        <i className="stat-icon icon-lg fa fa-tasks"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div className="databox bg-white radius-bordered">
                                <div className="databox-left bg-themethirdcolor">
                                    <div className="databox-piechart">
                                        <div data-toggle="easypiechart" className="easyPieChart" data-barcolor="#fff" data-linecap="butt" data-percent="15" data-animate="500" data-linewidth="3" data-size="47" data-trackcolor="rgba(255,255,255,0.2)" style={{width: '47px', height: '47px', lineHeight: '47px'}}><span className="white font-90">15%</span><canvas width="47" height="47"></canvas></div>
                                    </div>
                                </div>
                                <div className="databox-right">
                                    <span className="databox-number themethirdcolor">5 medicines</span>
                                    <div className="databox-text darkgray">will expire in 20 days</div>
                                    <div className="databox-stat themethirdcolor radius-bordered">
                                        <i className="stat-icon  icon-lg fa fa-envelope-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div className="databox bg-white radius-bordered">
                                <div className="databox-left bg-themeprimary">
                                    <div className="databox-piechart">
                                        <div id="users-pie" data-toggle="easypiechart" className="easyPieChart" data-barcolor="#fff" data-linecap="butt" data-percent="76" data-animate="500" data-linewidth="3" data-size="47" data-trackcolor="rgba(255,255,255,0.1)" style={{width: '47px', height: '47px', lineHeight: '47px'}}><span className="white font-90">76%</span><canvas width="47" height="47"></canvas></div>
                                    </div>
                                </div>
                                <div className="databox-right">
                                    <span className="databox-number themeprimary">92 medicines</span>
                                    <div className="databox-text darkgray">Total</div>
                                    <div className="databox-state bg-themeprimary">
                                        <i className="fa fa-check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div className="databox bg-white radius-bordered">
                                <div className="databox-left no-padding">
                                    <img src="assets/img/avatars/John-Smith.jpg" style={{width:'65px', height:'65px'}} />
                                </div>
                                <div className="databox-right padding-top-20">
                                    <div className="databox-stat palegreen">
                                        <i className="stat-icon icon-xlg fa fa-phone"></i>
                                    </div>
                                    <div className="databox-text darkgray">JOHN SMITH</div>
                                    <div className="databox-text darkgray">TOP RESELLER</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div className="row">

              <div className="col-lg-6 col-md-12 col-sm-12 col-xs-12">
              <div className="databox databox-xxlg databox-vertical databox-shadowed bg-white radius-bordered padding-5">
                              <div className="databox-top">
                                  <div className="databox-row row-12">
                                      <div className="databox-cell cell-3 text-center">
                                          <div className="databox-number number-xxlg sonic-silver">164</div>
                                          <div className="databox-text storm-cloud">online</div>
                                      </div>
                                      <div className="databox-cell cell-9 text-align-center">
                                          <div className="databox-row row-6 text-left">
                                              <span className="badge badge-palegreen badge-empty margin-left-5"></span>
                                              <span className="databox-inlinetext uppercase darkgray margin-left-5">NEW</span>
                                              <span className="badge badge-yellow badge-empty margin-left-5"></span>
                                              <span className="databox-inlinetext uppercase darkgray margin-left-5">RETURNING</span>
                                          </div>
                                          <div className="databox-row row-6">
                                              <div className="progress bg-yellow progress-no-radius">
                                                  <div className="progress-bar progress-bar-palegreen" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style={{width: '78%'}}>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div className="databox-bottom">
                                  <div className="databox-row row-12">
                                      <div className="databox-cell cell-7 text-center  padding-5">
                                          <div id="dashboard-pie-chart-sources" className="chart" style={{padding: '0px', position: 'relative'}}><canvas className="flot-base" width="270" height="220" style={{direction: 'ltr', position: 'absolute', left: '0px', top: '0px', width: '270px', height: '220px'}}></canvas><canvas className="flot-overlay" width="270" height="220" style={{direction: 'ltr', position: 'absolute', left: '0px', top: '0px', width: '270px', height: '220px'}}></canvas></div>
                                      </div>
                                      <div className="databox-cell cell-5 text-center no-padding-left padding-bottom-30">
                                          <div className="databox-row row-2 bordered-bottom bordered-ivory padding-10">
                                              <span className="databox-text sonic-silver pull-left no-margin">Type</span>
                                              <span className="databox-text sonic-silver pull-right no-margin uppercase">PCT</span>
                                          </div>
                                          <div className="databox-row row-2 bordered-bottom bordered-ivory padding-10">
                                              <span className="badge badge-blue badge-empty pull-left margin-5"></span>
                                              <span className="databox-text darkgray pull-left no-margin hidden-xs">FEED</span>
                                              <span className="databox-text darkgray pull-right no-margin uppercase">46%</span>
                                          </div>
                                          <div className="databox-row row-2 bordered-bottom bordered-ivory padding-10">
                                              <span className="badge badge-orange badge-empty pull-left margin-5"></span>
                                              <span className="databox-text darkgray pull-left no-margin hidden-xs">PREFERRAL</span>
                                              <span className="databox-text darkgray pull-right no-margin uppercase">21%</span>
                                          </div>
                                          <div className="databox-row row-2 bordered-bottom bordered-ivory padding-10">
                                              <span className="badge badge-pink badge-empty pull-left margin-5"></span>
                                              <span className="databox-text darkgray pull-left no-margin hidden-xs">DIRECT</span>
                                              <span className="databox-text darkgray pull-right no-margin uppercase">12%</span>
                                          </div>
                                          <div className="databox-row row-2 bordered-bottom bordered-ivory padding-10">
                                              <span className="badge badge-palegreen badge-empty pull-left margin-5"></span>
                                              <span className="databox-text darkgray pull-left no-margin hidden-xs">EMAIL</span>
                                              <span className="databox-text darkgray pull-right no-margin uppercase">11%</span>
                                          </div>
                                          <div className="databox-row row-2 padding-10">
                                              <span className="badge badge-yellow badge-empty pull-left margin-5"></span>
                                              <span className="databox-text darkgray pull-left no-margin hidden-xs">ORGANIC</span>
                                              <span className="databox-text darkgray pull-right no-margin uppercase">10%</span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
              </div>

              <div className="col-lg-6 col-md-3 col-sm-12 col-xs-12">
              <div className="orders-container">
                              <div className="orders-header">
                                  <h6>Latest Orders</h6>
                              </div>
                              <ul className="orders-list">
                                  <li className="order-item">
                                      <div className="row">
                                          <div className="col-lg-8 col-md-8 col-sm-8 col-xs-8 item-left">
                                              <div className="item-booker">Ned Stards</div>
                                              <div className="item-time">
                                                  <i className="fa fa-calendar"></i>
                                                  <span>10 minutes ago</span>
                                              </div>
                                          </div>
                                          <div className="col-lg-4 col-md-4 col-sm-4 col-xs-4 item-right">
                                              <div className="item-price">
                                                  <span className="currency">$</span>
                                                  <span className="price">400</span>
                                              </div>
                                          </div>
                                      </div>
                                      <a className="item-more" href="">
                                          <i></i>
                                      </a>
                                  </li>
                                  <li className="order-item top">
                                      <div className="row">
                                          <div className="col-lg-8 col-md-8 col-sm-8 col-xs-8 item-left">
                                              <div className="item-booker">Steve Lewis</div>
                                              <div className="item-time">
                                                  <i className="fa fa-calendar"></i>
                                                  <span>2 hours ago</span>
                                              </div>
                                          </div>
                                          <div className="col-lg-4 col-md-4 col-sm-4 col-xs-4 item-right">
                                              <div className="item-price">
                                                  <span className="currency">$</span>
                                                  <span className="price">620</span>
                                              </div>
                                          </div>
                                      </div>
                                      <a className="item-more" href="">
                                          <i></i>
                                      </a>
                                  </li>
                                  <li className="order-item">
                                      <div className="row">
                                          <div className="col-lg-8 col-md-8 col-sm-8 col-xs-8 item-left">
                                              <div className="item-booker">John Ford</div>
                                              <div className="item-time">
                                                  <i className="fa fa-calendar"></i>
                                                  <span>Today 8th July</span>
                                              </div>
                                          </div>
                                          <div className="col-lg-4 col-md-4 col-sm-4 col-xs-4 item-right">
                                              <div className="item-price">
                                                  <span className="currency">$</span>
                                                  <span className="price">220</span>
                                              </div>
                                          </div>
                                      </div>
                                      <a className="item-more" href="">
                                          <i></i>
                                      </a>
                                  </li>
                                  <li className="order-item">
                                      <div className="row">
                                          <div className="col-lg-8 col-md-8 col-sm-8 col-xs-8 item-left">
                                              <div className="item-booker">Kim Basinger</div>
                                              <div className="item-time">
                                                  <i className="fa fa-calendar"></i>
                                                  <span>Yesterday 7th July</span>
                                              </div>
                                          </div>
                                          <div className="col-lg-4 col-md-4 col-sm-4 col-xs-4 item-right">
                                              <div className="item-price">
                                                  <span className="currency">$</span>
                                                  <span className="price">400</span>
                                              </div>
                                          </div>
                                      </div>
                                      <a className="item-more" href="">
                                          <i></i>
                                      </a>
                                  </li>
                                  <li className="order-item">
                                      <div className="row">
                                          <div className="col-lg-8 col-md-8 col-sm-8 col-xs-8 item-left">
                                              <div className="item-booker">Steve Lewis</div>
                                              <div className="item-time">
                                                  <i className="fa fa-calendar"></i>
                                                  <span>5th July</span>
                                              </div>
                                          </div>
                                          <div className="col-lg-4 col-md-4 col-sm-4 col-xs-4 item-right">
                                              <div className="item-price">
                                                  <span className="currency">$</span>
                                                  <span className="price">340</span>
                                              </div>
                                          </div>
                                      </div>
                                      <a className="item-more" href="">
                                          <i></i>
                                      </a>
                                  </li>
                              </ul>
                              <div className="orders-footer">
                                  <a className="show-all" href=""><i className="fa fa-angle-down"></i> Show All</a>
                                  <div className="help">
                                      <a href=""><i className="fa fa-question"></i></a>
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
