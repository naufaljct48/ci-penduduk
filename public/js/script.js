function post() {
  $("#result").html(
    '<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div></div>'
  );
  $("input").attr("disabled", "disabled");
  $("select").attr("disabled", "disabled");
  $("button").attr("disabled", "disabled");
  $("textarea").attr("disabled", "disabled");
}
function hasil() {
  $("input").removeAttr("disabled");
  $("select").removeAttr("disabled");
  $("button").removeAttr("disabled");
  $("textarea").removeAttr("disabled");
}
