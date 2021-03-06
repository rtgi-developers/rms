"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.createDot = void 0;

var _array = require("../../utils/array");

var _factory = require("../../utils/factory");

var name = 'dot';
var dependencies = ['typed', 'add', 'multiply'];
var createDot = /* #__PURE__ */(0, _factory.factory)(name, dependencies, function (_ref) {
  var typed = _ref.typed,
      add = _ref.add,
      multiply = _ref.multiply;

  /**
   * Calculate the dot product of two vectors. The dot product of
   * `A = [a1, a2, a3, ..., an]` and `B = [b1, b2, b3, ..., bn]` is defined as:
   *
   *    dot(A, B) = a1 * b1 + a2 * b2 + a3 * b3 + ... + an * bn
   *
   * Syntax:
   *
   *    math.dot(x, y)
   *
   * Examples:
   *
   *    math.dot([2, 4, 1], [2, 2, 3])       // returns number 15
   *    math.multiply([2, 4, 1], [2, 2, 3])  // returns number 15
   *
   * See also:
   *
   *    multiply, cross
   *
   * @param  {Array | Matrix} x     First vector
   * @param  {Array | Matrix} y     Second vector
   * @return {number}               Returns the dot product of `x` and `y`
   */
  return typed(name, {
    'Matrix, Matrix': function MatrixMatrix(x, y) {
      return _dot(x.toArray(), y.toArray());
    },
    'Matrix, Array': function MatrixArray(x, y) {
      return _dot(x.toArray(), y);
    },
    'Array, Matrix': function ArrayMatrix(x, y) {
      return _dot(x, y.toArray());
    },
    'Array, Array': _dot
  });
  /**
   * Calculate the dot product for two arrays
   * @param {Array} x  First vector
   * @param {Array} y  Second vector
   * @returns {number} Returns the dot product of x and y
   * @private
   */
  // TODO: double code with math.multiply

  function _dot(x, y) {
    var xSize = (0, _array.arraySize)(x);
    var ySize = (0, _array.arraySize)(y);
    var len = xSize[0];
    if (xSize.length !== 1 || ySize.length !== 1) throw new RangeError('Vector expected'); // TODO: better error message

    if (xSize[0] !== ySize[0]) throw new RangeError('Vectors must have equal length (' + xSize[0] + ' != ' + ySize[0] + ')');
    if (len === 0) throw new RangeError('Cannot calculate the dot product of empty vectors');
    var prod = 0;

    for (var i = 0; i < len; i++) {
      prod = add(prod, multiply(x[i], y[i]));
    }

    return prod;
  }
});
exports.createDot = createDot;