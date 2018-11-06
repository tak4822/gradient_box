// Trim string
String.prototype.customTrim = function (length) {
  return this.length > length ? this.substring(0, length) + '...' : this;
};
