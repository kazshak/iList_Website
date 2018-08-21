'use strict';

angular.module('ilist', [])
.controller('ContactUsController', function () {
    this.email = {};
    this.messageSent = false;
    this.sendEmail = function (emailtosend) {
        console.log(emailtosend.firstname+" "+emailtosend.lastname+" "+
              emailtosend.phonenumber+" "+emailtosend.emailadd+" "+
              emailtosend.body);
        console.log(emailtosend);
        $.ajax({
            type: "POST",
            url: 'sendemail.php',
            datatype: 'json',
            data: emailtosend,
            success: function (obj, textstatus) {
                console.log(obj);
                console.log(textstatus);
                }
               });
        this.email = {};
        this.messageSent = true;
    };
})
.controller('FeaturedListingController', function(){
    var scope = this;
    var result = [];
    this.loaded = false;
    this.showCaptions = true;
    this.properties = [{address: 'LOADING .....'}];

    this.setProperties = function(result, origScope){
        console.log('setProperties called');
        console.log(origScope.properties);
        console.log(result);
        origScope.properties = result;
        console.log('this.properties');
        console.log(origScope.properties);
    }

    this.init = function(){
        $.ajax({
        type: "POST",
        url: 'getdirectory.php',
        async: false,
        datatype: 'json',
        data: {}
           }).done(function(data){
                console.log('return successful');
                console.log(data);
                scope.setProperties(data, scope);
                scope.loaded = true;
            }).fail(function(data){
                console.log('failure');
                console.log(data);
                scope.loaded = true;
            });
    }

    this.showProperty = function (property) {
        this.proptoshow = property;
        this.numPics = property.pics.length;
        console.log(this.numPics);
        console.log(property);
    }
    
    this.toggleCaptions = function () {
        this.showCaptions = !this.showCaptions;
    }


})
.controller('DirectoryController', function(){
    this.seeDirectory = function(){
        console.log('button pushed');
        $.ajax({
            type: "POST",
            url: 'getdirectory.php',
            datatype: 'json',
            data: {}
               }).done(function(data){
                    console.log('return successful');
                    console.log(data);
                }).fail(function(data){
                    console.log('failure');
                    console.log(data);
                }).always(function(data){
                    console.log('always');
                    console.log(data);
                });
        console.log('past ajax call');
    };
});

