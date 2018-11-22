Event.observe(window, 'load', init, false);
function init() {
  Event.observe('addressForm', 'submit', storeAddress);
}
function storeAddress(e) {
  $('response').innerHTML = 'Adicionando email...';
  var pars = 'address=' + escape($F('address'));
  var myAjax = new Ajax.Updater('response', 'ajaxServer.php', {method: 'get', parameters: pars});
  Event.stop(e);
}