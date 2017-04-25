login(){  
    let a = this.http.get("http://localhost/android/logins.php?user=" + this.data.username + "&pass=" + this.data.password + "")
    .map(res => res.json()).subscribe(data => {
        this.post = data.data;
        console.log(this.post);
        if(Object.keys(this.post).length === 1){
          let loader = this.loadingCtrl.create({
            content: "Loading..."
          });
          loader.present();
          this.navCtrl.setRoot(HomePage);
          loader.dismiss();
        }else {
          let alert = this.alert.create({
            title:"username atau pasword salah",
            buttons: ['OK']
          });alert.present();
          this.navCtrl.setRoot(LoginPage);
          console.log('gagal');
        }
    });
  }