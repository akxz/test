<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
        <meta name="csrf-token" value="{{ csrf_token() }}" />
    </head>
    <body>
        <div id="app">
          <example-component></example-component>
        </div>

        <div id="dynamic-component-demo" class="demo">
          <button
            v-for="tab in tabs"
            v-bind:key="tab"
            v-bind:class="['tab-button', { active: currentTab === tab }]"
            v-on:click="currentTab = tab"
          >@{{ tab }}</button>

          <component
            v-bind:is="currentTabComponent"
            class="tab"
          ></component>
        </div>



        <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
        <script>
        Vue.component('tab-home', {
        	template: '<div>Home component</div>'
        });
        Vue.component('tab-posts', {
        	template: '<div>Posts component</div>'
        });
        Vue.component('tab-archive', {
        	template: '<div>Archive component</div>'
        });
        Vue.component('tab-xz', {
        	template: '<div>xz component</div>'
        });

        new Vue({
          el: '#dynamic-component-demo',
          data: {
            currentTab: 'Home',
            tabs: ['Home', 'Posts', 'Archive', 'XZ']
          },
          computed: {
            currentTabComponent: function () {
              return 'tab-' + this.currentTab.toLowerCase()
            }
          }
        });
        </script>
    </body>
</html>
