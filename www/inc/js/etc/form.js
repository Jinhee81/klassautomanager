function formCreate(nm, mt, at, tg){
    var f = document.createElement('form');
    f.name = nm;
    f.method = mt;
    f.action = at;
    f.target = tg ? tg : "_self";
    return f;
  }
  function formInput(f, n, v){
    var i = document.createElement('Input');
    i.type = 'hidden';
    i.name = n;
    i.value = v;
    f.insertBefore(i, null);
    return f;
  }
  function formSubmit(f){
    document.body.appendChild(f);
    f.submit();
  }
  