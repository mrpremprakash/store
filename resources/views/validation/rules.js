var constraints = {
  medicine_name: {
    presence: true,
  },
  quantity: {
    numericality: {
      onlyInteger: true,
      greaterThan: 0,
      lessThanOrEqualTo: 30
    }
  }
};
export default constraints;
