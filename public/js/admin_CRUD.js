const deleteUser = document.querySelectorAll('#deleteuser');

deleteUser.forEach((el) => {
  el.addEventListener('click', async (e) => {
    const userid = el.attributes.getNamedItem('data-userid').value;
    // console.log(userid);
  
    const data = await fetch(`http://localhost:8080/admin/users/${userid}`,
      {method: 'DELETE'});

    console.log(data);
    location.reload();
  });
});