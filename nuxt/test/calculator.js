export default class Calculator {
  _checkArgs(a, b) {
    if (a === undefined || b === undefined) {
      throw new Error("2 arguments are required");
    }
    if (typeof a !== "number" || typeof b !== "number") {
      throw new Error("The arguments must be numbers");
    }
  }
  add(a, b) {
    this._checkArgs(a, b);
    return a + b;
  }
  subtract(a, b) {
    this._checkArgs(a, b);
    return a - b;
  }
}
