module.exports = [

    {
        entry: {
            /*pagekit addons*/
            "widget-blogposts": "./app/components/widget-blogposts.vue"
        },
        output: {
            filename: "./app/bundle/[name].js"
        },
        externals: {
            "lodash": "_",
            "jquery": "jQuery",
            "uikit": "UIkit",
            "vue": "Vue"
        },
        module: {
            loaders: [
                {test: /\.vue$/, loader: "vue"},
                {test: /\.html$/, loader: "vue-html"}
            ]
        }

    }

];
