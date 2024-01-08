const deleteUser = document.querySelectorAll("#deleteuser[enable]");
const updateUser = document.querySelectorAll("#updateuser");

const updateModaldiv = document.getElementById("updatemodal");
const updateModal = new bootstrap.Modal(updateModaldiv, {});
const updateButton = document.querySelector("#submitchanges");

const host = `http://${window.location.host}/`;

deleteUser.forEach((el) => {
  el.addEventListener("click", async () => {
    const userid = el.attributes.getNamedItem("data-userid").value;

    if (userid == CURRENT_USER) {
      console.log("can't delete current user");
      return;
    }

    if (confirm("Are you sure to delete this user?")) {
      const data = await fetch(`${host}admin/users/${userid}`, {
        method: "DELETE",
      });

      // console.log(await data.json());
      location.reload();
    }
  });
});

updateUser.forEach((el) => {
  el.addEventListener("click", async () => {
    const userid = el.attributes.getNamedItem("data-userid").value;

    const result = await fetch(`${host}admin/users/${userid}`);
    const json = await result.json();

    const email = document.querySelector(
      'form#update-user input[name="email"]'
    );
    const username = document.querySelector(
      'form#update-user input[name="username"]'
    );
    const fullname = document.querySelector(
      'form#update-user input[name="fullname"]'
    );
    const phonenumber = document.querySelector(
      'form#update-user input[name="phone_number"]'
    );
    const password = document.querySelector(
      'form#update-user input[name="password"]'
    );
    const gender = document.querySelector(
      `form#update-user input[name="gender"][value="${json[0].gender}"]`
    );

    email.value = json[0].email;
    username.value = json[0].username;
    fullname.value = json[0].username;
    phonenumber.value = json[0].phone_number;

    if (gender) {
      gender.checked = true;
    }

    updateButton.addEventListener("click", async () => {
      const genderField = document.querySelectorAll(
        'form#update-user input[name="gender"]'
      );

      let genderData = gender.value;

      for (const gen of genderField) {
        if (gen.checked) {
          genderData = gen.value;
        }
      }

      // console.log(genderData);
      const data = await fetch(`${host}admin/users/${userid}`, {
        method: "PUT",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          email: email.value,
          username: username.value,
          fullname: fullname.value,
          phone_number: phonenumber.value,
          password: password.value,
          gender: genderData,
        }),
      });

      // console.log(data);
      // console.log(await data.json());

      updateModal.hide();
      window.location.reload();
    });

    updateModal.show();
  });
});

updateModaldiv.addEventListener("hide.bs.modal", () => {
  console.log("hide");

  const username = document.querySelector(
    'form#update-user input[name="username"]'
  );
  const fullname = document.querySelector(
    'form#update-user input[name="fullname"]'
  );
  const phonenumber = document.querySelector(
    'form#update-user input[name="phone_number"]'
  );
  const password = document.querySelector(
    'form#update-user input[name="password"]'
  );
  const gender = document.querySelectorAll(
    `form#update-user input[name="gender"]`
  );

  //reset
  username.value = "";
  fullname.value = "";
  phonenumber.value = "";
  password.value = "";

  gender.forEach((e) => (e.checked = false));

  updateButton.removeEventListener("click", () => {
    console.log("delete event");
  });
});
