import React from 'react';
import toastr from 'toastr';

export default class InvoiceAdd extends React.Component {
  constructor(props) {
    super(props);
    this.state = {};
  }
  render() {
    var self = this;
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
          <div className="row">
            <div className="col-lg-12 col-sm-12 col-xs-12">
                <div className="widget">
                    <div className="widget-header bordered-bottom bordered-palegreen">
                        <span className="widget-caption">Create New Invoice</span>
                    </div>
                    <div className="widget-body">
                        <div>
                            <form className="form-horizontal form-bordered" role="form" onSubmit={this.validate.bind(this)}>
                                <div className="form-group">
                                    <label for="inputEmail3" className="col-sm-2 control-label no-padding-right">Name:</label>
                                    <div className="col-sm-10">
                                        <input type="text" className="form-control" placeholder="Medicine Name" name="medicine_name" value={self.state.medicine_name}/>
                                    </div>
                                </div>
                                <div className="form-group">
                                    <label for="inputPassword3" className="col-sm-2 control-label no-padding-right">Quantity:</label>
                                    <div className="col-sm-10">
                                        <input type="text" className="form-control" placeholder="Quantity" value={self.state.quantity}/>
                                    </div>
                                </div>
                                <div className="form-group">
                                    <label for="inputPassword3" className="col-sm-2 control-label no-padding-right">Price:</label>
                                    <div className="col-sm-10">
                                        <input type="text" className="form-control" placeholder="Price" value={self.state.price}/>
                                    </div>
                                </div>

                                <div className="form-group">
                                    <label for="inputPassword3" className="col-sm-2 control-label no-padding-right">Discount:</label>
                                    <div className="col-sm-10">
                                        <input type="text" className="form-control" placeholder="Discount" value={this.state.discount}/>
                                    </div>
                                </div>

                                <div className="form-group">
                                    <div className="col-sm-offset-2 col-sm-10">
                                        <button type="submit" className="btn btn-palegreen">Add To Cart</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    )
  };
  validate(event) {
    event.preventDefault();
    var self = this;
    var invoice_notification_items = this.props.container.state.invoice_notification_items;
    invoice_notification_items.push({
      label: this.state.medicine_name,
      desc: 'Quantity: '+this.state.quantity,
      price: this.state.price
    });
    this.props.container.setState({invoice_notification_items: invoice_notification_items});
    toastr["success"]("'" +this.state.medicine_name+ "' added successfully!")
  }
}
