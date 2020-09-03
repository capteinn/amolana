function make_token_key() {
  var text = "";
  var possible = "ABCDEFGHIJ0123456789";
  for (var i = 0; i < 20; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));
  return text;
}