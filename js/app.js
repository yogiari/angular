var MyApp = angular.module("MyApp",["angularUtils.directives.dirPagination"]);

MyApp.controller('MyCtrl', function ($scope,$http) {
	$scope.aksi="tambah";
	$scope.odpText={};
	$scope.oltText={};
	$scope.orderText={};
	$scope.maintenanceText={};

//=============data odp================================
	$scope.tambahData = function (){
		$http.post(
			'data/simpan-data.php',
			{
				data: $scope.odpText
			}
		).success(function(data){
			alert(data);
			$scope.aksi="tambah";
			$scope.dapatkanData();
		}).error(function(){
			alert("gagal simpan data");
		});
		console.log($scope.odpText);
	};

	$scope.ubahData = function(){
		$http.post(
			'data/ubah-data.php',
			{
				id: $scope.id,
				data: $scope.odpText
			}
		).success(function(data){
				alert(data);
				$scope.dapatkanData();
				$scope.aksi="ubah";
		}).error(function(){
				alert("gagal ubah data");
		});
	};	

	$scope.ubah = function(item,odpText){
		$scope.id = item.id;
		$scope.odpText = item;
		$scope.aksi = "ubah";
	};

	$scope.simpanData = function(){
		if ($scope.odpText=="") {
			alert("harus diisi ya")
		}else{
			switch ($scope.aksi) {
			case "tambah":
				$scope.tambahData();
				$scope.aksi;
			break;
			case "ubah":
				$scope.ubahData();
			break;
			}
		}
	};

	$scope.dapatkanData = function(){
		$http.post(
			'data/dapatkan-data.php'
		).success(function(data){
			$scope.dataODP = data;
			//alert("data");
		});
		//frame odp
		$http.post(
		 	'data/dapatkan-data-frame.php'
		).success(function(data){
		 	$scope.dataFrame = data;
		 	//alert("data");
		});
	};

	$scope.hapusData = function(id){
		$http.post(
			'data/hapus-data.php',
			{
				id: id
			}
		).success(function(){
			$scope.dapatkanData();
		}).error(function(){
			alert("gagal hapus data");
		});
	};

//=============data olt================================
	$scope.tambahDataOlt = function (){
		$http.post(
			'data/simpan-data-olt.php',
			{
				data: $scope.oltText
			}
		).success(function(data){
			alert(data);
			$scope.aksi="tambah";
			$scope.dapatkanDataOlt();
		}).error(function(){
			alert("gagal simpan data");
		});
	};

	$scope.ubahDataOlt = function(){
		$http.post(
			'data/ubah-data-olt.php',
			{
				id: $scope.id,
				data: $scope.oltText
			}
		).success(function(data){
				alert(data);
				$scope.dapatkanDataOlt();
				$scope.aksi="ubah";
		}).error(function(){
				alert("gagal ubah data");
		});
	};	

	$scope.ubahOlt = function(item,oltText){
		$scope.id = item.id;
		$scope.oltText = item;
		$scope.aksi = "ubah";
	};

	$scope.simpanDataOlt = function(){
		if ($scope.oltText=="") {
			alert("harus diisi ya")
		}else{
			switch ($scope.aksi) {
			case "tambah":
				$scope.tambahDataOlt();
				$scope.aksi;
			break;
			case "ubah":
				$scope.ubahDataOlt();
			break;
			}
		}
	};

	$scope.dapatkanDataOlt = function(){
		$http.post(
			'data/dapatkan-data-olt.php'
		).success(function(data){
			$scope.dataOlt = data;
			console.log(dataOlt);
		});
	};

	$scope.hapusDataOlt = function(id){
		$http.post(
			'data/hapus-data-olt.php',
			{
				id: id
			}
		).success(function(){
			$scope.dapatkanDataOlt();
		}).error(function(){
			alert("gagal hapus data");
		});
	};
//========maintenance==================================
	$scope.detailorder = function(id){
		$http.get('data/detailorder.php?r='+id).success(function(data){
			$scope.data = data;
		});
	};

//========order tiket==================================
	$scope.simpanData = function(){
		if ($scope.odpText=="") {
			alert("harus diisi ya")
		}else{
			switch ($scope.aksi) {
			case "tambah":
				$scope.tambahData();
				$scope.aksi;
			break;
			case "ubah":
				$scope.ubahData();
			break;
			}
		}
	};

	$scope.simpanOrder = function (){
		$http.post('data/simpan-data-order.php',{ data: $scope.orderText}).success(function(data){
			alert(data);
			// console.log($scope.orderText)
		}).error(function(){
			alert(data);
			// console.log($scope.orderText)
		});
		//alert($scope.odpText)
	};

	//========histori==========================================
	$scope.dapatkanHistory = function(){
		$http.post(
			'data/dapatkan-data-history.php'
		).success(function(data){
			$scope.dataH = data;
		});
		console.log(data);
	};
	//=========data ogp=======================================
	$scope.dapatkanOgp = function(){
		$http.post(
			'data/dapatkan-data-ogp.php'
		).success(function(data){
			$scope.dataH = data;
			// alert('ok');
		});
		console.log(data);
	};
	
	//==========data maintenance==============================
	$scope.dapatkanDataMaintenance = function(){
		$http.post(
			'data/dapatkan-data-petugas-maintenance.php'
		).success(function(data){
			$scope.maintain = data;
		});
		//
		$http.post(
			'data/dapatkan-data-okupansi-maintenance.php'
		).success(function(data){
			$scope.okupansi = data;
		});
		//
		$http.post(
		 	'data/dapatkan-data-frame.php'
		).success(function(data){
		 	$scope.dataFrame = data;
		});
	};
	
	$scope.tambahDataMaintenance = function (){
		$http.post(
			'data/simpan-data-okupansi-maintenance.php',
			{
				data: $scope.maintenanceText
			}
		).success(function(data){
			alert(data);
			$scope.aksi="tambah";
			$scope.dapatkanDataMaintenance();
		}).error(function(){
			alert("gagal simpan data");
		});
	};

	$scope.ubahDataMaintenance = function(){
		$http.post(
			'data/ubah-data-okupansi-maintenance.php',
			{
				//id: $scope.id,
				data: $scope.maintenanceText
			}
		).success(function(data){
				alert(data);
				$scope.dapatkanDataMaintenance();
				$scope.aksi="ubah";
		}).error(function(){
				alert("gagal ubah data");
		});
	};	

	$scope.ubahMaintenance = function(item,maintenanceText){
		//$scope.id = item.id;
		$scope.maintenanceText = item;
		$scope.aksi = "ubah";
		console.log(item);
		console.log(maintenanceText);
	};

	$scope.simpanDataMaintenance = function(){
		
		if ($scope.maintenanceText=="") {
			alert("harus diisi ya")
		}else{
			switch ($scope.aksi) {
			case "tambah":
				$scope.tambahDataMaintenance();
				$scope.aksi;
			break;
			case "ubah":
				$scope.ubahDataMaintenance();
			break;
			}
		}
		console.log($scope.maintenanceText);
	};

	$scope.hapusDataMaintenance = function(id){
		$http.post(
			'data/hapus-data-okupansi-maintenance.php',
			{
				id: id
			}
		).success(function(){
			$scope.dapatkanDataMaintenance();
		}).error(function(){
			alert("gagal hapus data");
		});
	};
	//==========data assurance==============================
	$scope.dapatkanDataAssurance = function(){
		$http.post(
			'data/dapatkan-data-petugas-assurance.php'
		).success(function(data){
			$scope.maintain = data;
		});
		//
		$http.post(
			'data/dapatkan-data-okupansi-assurance.php'
		).success(function(data){
			$scope.okupansi = data;
		});
		//
		$http.post(
		 	'data/dapatkan-data-frame.php'
		).success(function(data){
		 	$scope.dataFrame = data;
		});
	};
	
	$scope.tambahDataAssurance = function (){
		$http.post(
			'data/simpan-data-okupansi-assurance.php',
			{
				data: $scope.assuranceText
			}
		).success(function(data){
			alert(data);
			$scope.aksi="tambah";
			$scope.dapatkanDataAssurance();
		}).error(function(){
			alert("gagal simpan data");
		});
	};

	$scope.ubahDataAssurance = function(){
		$http.post(
			'data/ubah-data-okupansi-assurance.php',
			{
				//id: $scope.id,
				data: $scope.assuranceText
			}
		).success(function(data){
				alert(data);
				$scope.dapatkanDataAssurance();
				$scope.aksi="ubah";
		}).error(function(){
				alert("gagal ubah data");
		});
	};	

	$scope.ubahAssurance = function(item,assuranceText){
		//$scope.id = item.id;
		$scope.assuranceText = item;
		$scope.aksi = "ubah";
		console.log(item);
		console.log(assuranceText);
	};

	$scope.simpanDataAssurance = function(){
		
		if ($scope.assuranceText=="") {
			alert("harus diisi ya")
		}else{
			switch ($scope.aksi) {
			case "tambah":
				$scope.tambahDataAssurance();
				$scope.aksi;
			break;
			case "ubah":
				$scope.ubahDataAssurance();
			break;
			}
		}
		console.log($scope.assuranceText);
	};

	$scope.hapusDataAssurance = function(id){
		$http.post(
			'data/hapus-data-okupansi-assurance.php',
			{
				id: id
			}
		).success(function(){
			$scope.dapatkanDataAssurance();
		}).error(function(){
			alert("gagal hapus data");
		});
	};

	//==========data user==============================
	$scope.dapatkanDataUser = function(){
		$http.post(
			'data/dapatkan-data-user.php'
		).success(function(data){
			$scope.user = data;
		});
		//
		$http.post(
			'data/dapatkan-data-jabatan.php'
		).success(function(data){
			$scope.jabatan = data;
		});
	};
	
	$scope.tambahDataUser = function (){
		var form_data = new FormData();  
        angular.forEach($scope.files, function(file){  
                form_data.append('file', file);
                // console.log(file);  
        }); 
        angular.forEach($scope.userText.nik, function(nik){  
                form_data.append('nik', $scope.userText.nik); 
                // console.log(nik); 
        });
        angular.forEach($scope.userText.nama, function(nama){  
                form_data.append('nama', $scope.userText.nama);
                // console.log(nama);   
        });
        angular.forEach($scope.userText.alamat, function(alamat){  
                form_data.append('alamat', $scope.userText.alamat);  
        });
        angular.forEach($scope.userText.no_hp, function(no_hp){  
                form_data.append('no_hp', $scope.userText.no_hp);  
        });
        angular.forEach($scope.userText.password, function(password){  
                form_data.append('password', $scope.userText.password);  
        });
        angular.forEach($scope.userText.jabatan, function(jabatan){  
                form_data.append('jabatan', $scope.userText.jabatan);  
        }); 
		$http.post(
			'data/simpan-data-user.php',form_data,
			{
				// data: $scope.userText,
				transformRequest: angular.identity,  
                headers: {'Content-Type': undefined,'Process-Data': false}
			}
		).success(function(data){
			alert(data);
			$scope.aksi="tambah";
			$scope.dapatkanDataUser();
		}).error(function(){
			alert("gagal simpan data");
		});
		
	};

	$scope.ubahDataAssurance = function(){
		$http.post(
			'data/ubah-data-user.php',
			{
				//id: $scope.id,
				data: $scope.userText
			}
		).success(function(data){
				alert(data);
				$scope.dapatkanDataUser();
				$scope.aksi="ubah";
		}).error(function(){
				alert("gagal ubah data");
		});
	};	

	$scope.ubahUser = function(item,userText){
		//$scope.id = item.id;
		$scope.userText = item;
		$scope.aksi = "ubah";
		console.log(item);
		console.log(userText);
	};

	$scope.simpanDataUser = function(){
		
		if ($scope.userText=="") {
			alert("harus diisi ya")
		}else{
			switch ($scope.aksi) {
			case "tambah":
				$scope.tambahDataUser();
				$scope.aksi;
			break;
			case "ubah":
				$scope.ubahDataUser();
			break;
			}
		}
		
	};

	$scope.hapusDataUser = function(id){
		$http.post(
			'data/hapus-data-user.php',
			{
				id: id
			}
		).success(function(){
			$scope.dapatkanDataUser();
		}).error(function(){
			alert("gagal hapus data");
		});
	};
	
});

// //directive untuk file input
MyApp.directive("fileInput", function($parse){  
      return{  
           link: function($scope, element, attrs){  
                element.on("change", function(event){  
                     var files = event.target.files;
                     var nik = $scope.userText.nik;
                     var nama = $scope.userText.nama;
                     var alamat = $scope.userText.alamat;
                     var no_hp = $scope.userText.no_hp;
                     var password = $scope.userText.password;
                     var jabatan = $scope.userText.jabatan; 
                     // var userText = $scope.userText; 
                     console.log(files);
                     // console.log(userText.nik);  
                     $parse(attrs.fileInput).assign($scope, element[0].files);  
                     $scope.$apply();  
                });  
           }  
      }  
 });  
//------------------->