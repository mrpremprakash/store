import React from 'react';
import toastr from 'toastr';
import validate from 'validate.js';
import validationRules from '../validation/rules.js';
import 'jquery-ui';
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
                            <form className="form-horizontal form-bordered add-invoice-form" role="form" onSubmit={this.validate.bind(this)}>
                                <div className="form-group">
                                    <label for="inputEmail3" className="col-sm-2 control-label no-padding-right">Name:</label>
                                    <div className="col-sm-10">
                                        <input type="text" className="form-control" placeholder="Medicine Name" name="medicine_name" id="tags" ref={(medicine_name) => this.medicine_name = medicine_name}/>
                                        <span className="widget-caption themesecondary error-msg"></span>
                                    </div>
                                </div>
                                <div className="form-group">
                                    <label for="inputPassword3" className="col-sm-2 control-label no-padding-right">Quantity:</label>
                                    <div className="col-sm-10">
                                        <input type="text" className="form-control" placeholder="Quantity" ref={(quantity) => this.quantity = quantity}/>
                                        <span className="widget-caption themesecondary error-msg"></span>
                                    </div>
                                </div>
                                <div className="form-group">
                                    <label for="inputPassword3" className="col-sm-2 control-label no-padding-right">Price:</label>
                                    <div className="col-sm-10">
                                        <input type="text" className="form-control" placeholder="Price" ref={(price) => this.price = price}/>
                                    </div>
                                </div>

                                <div className="form-group">
                                    <label for="inputPassword3" className="col-sm-2 control-label no-padding-right">Discount:</label>
                                    <div className="col-sm-10">
                                        <input type="text" className="form-control" placeholder="Discount" ref={(discount) => this.discount = discount}/>
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
    var errors = validate({medicine_name: this.medicine_name.value, quantity: this.quantity.value}, validationRules);
    console.log(errors);
    var self = this;
    this.showErrorMessage(errors);
    if(typeof errors == 'undefined') {
      var invoice_notification_items = this.props.container.state.invoice_notification_items;
      invoice_notification_items.push({
        label: this.medicine_name.value,
        desc: 'Quantity: '+this.quantity.value,
        price: this.price.value
      });
      this.props.container.setState({invoice_notification_items: invoice_notification_items});
      toastr["success"]("'" + this.medicine_name.value + "' added successfully!");
      $('form.add-invoice-form')[0].reset();
    }
  };
  showErrorMessage(errors) {
    var form = $('form.add-invoice-form');
    form.find('.error-msg').text('');
    for(var input_name in errors) {
      $(this[input_name]).parent().find('.error-msg').text(errors[input_name][0]);
    }
  };
  componentDidMount() {
    $( "#tags" ).autocomplete({
      source: "api/medicine",
      minLength: 2,
      select: function( event, ui ) {
        console.log( "Selected: " + ui.item.value + " aka " + ui.item.id );
      }
    });
  }
}
