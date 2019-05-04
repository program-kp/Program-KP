function onPageLoad() {
    getUserIP(function(ip){
        $(".ip-tag").html(ip);
        $(".ip-input").val(ip);
    });
}

var mainContent = new Vue({
    el: "#page",
    data: {
        content: '',
        progressLoad: false,
        failLoad: false,
    }
});

var sidebar = new Vue({
    el: '#menu-navigation',
    data:{
        isActive:[]
    },
    methods: {
        navigate: function (page,menuOrder) {
            this.isActive = [];
            this.isActive[menuOrder] = true;

            var url = '';
            if (!baseUrl) {
                url = window.location.href.split("#")[0];
                url = `${url}/${page}`;
            } else {
                url += 'main/' + page;
            }
            mainContent.$data.progressLoad = true;
            mainContent.$data.content = '';
            fetch(url)
                .then(function (res) {
                    mainContent.$data.progressLoad = false;
                    return res.text();
                })
                .then(function (html) {
                    mainContent.$data.content = html;
                    onPageLoad();
                }).catch(function (err) {
                    mainContent.$data.progressLoad = false;
                    mainContent.$data.failLoad = true;
            })
        }
    },
    created: function () {
        this.navigate('dashboard',0);
    }
});