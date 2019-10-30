function get_and_handle_json(sql,handler){
  var out;

  $.ajax({
    url: "post_sql.php",
    method: "post",
    data: {"sql": sql}
  }).done(handler);
}

function json_to_table(json){
  var out = "<table>";

  var obj = JSON.parse(json);
  var cols = Object.keys(obj);
  for(var i = 0; i < cols.length; i++){
    out += "<th>" + cols[i] + "</th>";
  }

  var height = obj[cols[0]].length;

  for(var i = 0; i < height; i++){
    out += "<tr>";
    for(var j = 0; j < cols.length; j++){
      var col = obj[cols[j]];
      out += "<td>" + col[i] + "</td>";
    }
    out += "</tr>";
  }

  out += "</table>";

  return out;
}
