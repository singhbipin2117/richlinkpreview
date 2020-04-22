$(document).ready(function(){
  $("#richlinkpreview").on('submit', function(e){
    e.preventDefault();
    var url = 'metareader.php';
    var imageUrl = $("#imageUrl").val();
    var params = 'url=' + imageUrl;
    toDataURL(url, params, function (response) {
      console.log(response);
      var dataPreview = richPreview(response);
      $("#previews").html(dataPreview);
    })

  });

  function richPreview(data){

    var text =  '<div class="card mb-3 row">';
    if (data['ogimage']){
      text += '<img src = "' + data['ogimage']+'" class="card-img-top col-sm-2" alt = "..." >';
        }
    text +=  '<div class="card-body col-sm-8">';
    if (data['ogtitle']) {
      text += '<h5 class="card-title">' + data['ogtitle'] + '</h5>';
    } else if (data['title']){
      text += '<h5 class="card-title">' + data['title'] + '</h5>';
        }
    if (data['ogdescription' ]) {
      text += '<p class="card-text">' + data['ogdescription'] + '</p>';
    } else if (data['description']) {
      text += '<p class="card-text">' + data['description'] + '</p>';
        }
    text +=' </div>';
    text += '</div >';

    return text;
  }


  function toDataURL(url, params, callback) {
    var xhr = createCORSRequest('POST', url);
    //Send the proper header information along with the request
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {//Call a function when the state changes.
      if (xhr.readyState == 4 && xhr.status == 200) {
        callback(xhr.response);
      }
    }
    xhr.responseType = 'json';
    xhr.send(params);
  }

  function createCORSRequest(method, url) {
    var xhr = new XMLHttpRequest();
    if ("withCredentials" in xhr) {
      xhr.open(method, url, true);
    } else if (typeof XDomainRequest != "undefined") {
      xhr = new XDomainRequest();
      xhr.open(method, url);
    } else {
      xhr = null;
    }
    return xhr;
  }
});
