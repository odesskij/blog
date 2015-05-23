/*global Routing*/
require([
    'jquery',
    'underscore',
    'backbone',
    'backbone.marionette',
    'domReady!'
], function ($, _, Backbone, Marionette) {
    'use strict';

    console.log('jquery', $);
    console.log('undercore', _);
    console.log('Backbone', Backbone);
    console.log('Marionette', Marionette);
    console.log('// ---------------------------------------------------- //');

    // ---------------------------------------------------- //


    var PostListItemView = Backbone.Marionette.ItemView.extend({
        "template": "#post-list-item-template"
    });

    var PostListView = Marionette.CollectionView.extend({
        "childView": PostListItemView
    });

    var Post = Backbone.Model.extend({
        "url": function () {
            return Routing.generate('post_read', {
                "post": this.id
            });
        }
    });


    var PostCollection = Backbone.Collection.extend({
        "model": Post,
        "url":   function () {
            return Routing.generate('post_list');
        }
    });


    var collection = new PostCollection();


    collection.fetch({
        "success": function () {

            console.log(1);

            var view = new PostListView({
                "el":    "#main-content",
                "model": collection
            });

            view.render();


            console.log(view);
        }
    });

    return;


    var AppLayoutView = Backbone.Marionette.LayoutView.extend({
        "template": "#layout-view-template",
        "regions":  {
            "menu":    "#menu",
            "content": "#content"
        }
    });

    var layoutView = new AppLayoutView({
        "el": "#main-content",
    });


    var app = new Marionette.Application({
        "rootView": layoutView
    });


    app.rootView = layoutView;


    app.on('start', function () {
        Backbone.history.start();
        this.rootView.render();
    });


    window.App = app;
    app.start();
});