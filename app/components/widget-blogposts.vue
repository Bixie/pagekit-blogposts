<template>

    <div class="uk-grid pk-grid-large" data-uk-grid-margin>
        <div class="uk-flex-item-1 uk-form-horizontal">

            <div class="uk-form-row">
                <label for="form-title" class="uk-form-label">{{ 'Title' | trans }}</label>
                <div class="uk-form-controls">
                    <input id="form-title" class="uk-form-width-large" type="text" name="title" v-model="widget.title" v-validate:required>
                    <p class="uk-form-help-block uk-text-danger" v-show="form.title.invalid">{{ 'Title cannot be blank.' | trans }}</p>
                </div>
            </div>

            <div class="uk-form-row">
                <label for="form-view" class="uk-form-label">{{ 'Layout' | trans }}</label>
                <div class="uk-form-controls">
                    <select id="form-view" v-model="widget.data.view" class="uk-form-width-medium">
                        <option value="list">{{ 'List' | trans }}</option>
                        <option value="grid">{{ 'Grid' | trans }}</option>
                    </select>
                </div>
            </div>

            <div class="uk-form-row">
                <label for="form-count" class="uk-form-label">{{ 'Count' | trans }}</label>
                <div class="uk-form-controls">
                    <input id="form-count" class="uk-form-width-small uk-text-right" type="number" name="title"
                           v-model="widget.data.count" min="0" number>
                </div>
            </div>

            <div class="uk-form-row">
                <label for="form-show_image" class="uk-form-label">{{ 'Show image' | trans }}</label>
                <div class="uk-form-controls">
                    <select id="form-show_image" v-model="widget.data.show_image" class="uk-form-width-medium">
                        <option value="">{{ 'No image' | trans }}</option>
                        <option value="side">{{ 'Side' | trans }}</option>
                        <option value="top">{{ 'Top' | trans }}</option>
                    </select>
                </div>
            </div>

            <div v-show="widget.data.view == 'grid'" class="uk-form-row">
                <label for="form-cols" class="uk-form-label">{{ 'Columns' | trans }}</label>
                <div class="uk-form-controls">
                    <select id="form-cols" v-model="widget.data.cols" class="uk-form-width-medium">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
            </div>

            <div v-show="widget.data.view == 'grid'" class="uk-form-row">
                <label for="form-panel_class" class="uk-form-label">{{ 'Panel' | trans }}</label>
                <div class="uk-form-controls">
                    <select id="form-panel_class" v-model="widget.data.panel_class" class="uk-form-width-medium">
                        <option value="">Blank</option>
                        <option value="uk-panel-box">{{ 'Panel box' | trans }}</option>
                        <option value="uk-panel-space">{{ 'Panel space' | trans }}</option>
                        <option value="uk-panel-box uk-panel-box-primary">{{ 'Panel Primary' | trans }}</option>
                        <option value="uk-panel-box uk-panel-box-secondary">{{ 'Panel Secondary' | trans }}</option>
                    </select>
                </div>
            </div>

            <div class="uk-form-row">
                <label for="form-content_length" class="uk-form-label">{{ 'Content length' | trans }}</label>
                <div class="uk-form-controls">
                    <input id="form-content_length" class="uk-form-width-small uk-text-right" type="number" name="title"
                           v-model="widget.data.content_length" min="0" number>
                </div>
            </div>

            <div class="uk-form-row">
                <label for="form-show_meta" class="uk-form-label">{{ 'Show meta' | trans }}</label>
                <div class="uk-form-controls">
                    <select id="form-show_meta" v-model="widget.data.show_meta" class="uk-form-width-medium" number>
                        <option value="1">{{ 'Yes' | trans }}</option>
                        <option value="0">{{ 'No' | trans }}</option>
                    </select>
                </div>
            </div>

            <div class="uk-form-row">
                <label for="form-show_readmorelink" class="uk-form-label">{{ 'Show read more' | trans }}</label>
                <div class="uk-form-controls">
                    <select id="form-show_readmorelink" v-model="widget.data.show_readmorelink" class="uk-form-width-medium" number>
                        <option value="1">{{ 'Yes' | trans }}</option>
                        <option value="0">{{ 'No' | trans }}</option>
                    </select>
                </div>
            </div>

            <div v-show="widget.data.show_readmorelink == 1" class="uk-form-row">
                <label for="form-readmore_text" class="uk-form-label">{{ 'Link text' | trans }}</label>
                <div class="uk-form-controls">
                    <input id="form-readmore_text" class="uk-form-width-large" type="text" name="title" v-model="widget.data.readmore_text">
                </div>
            </div>

            <div class="uk-form-row">
                <label for="form-show_bloglink" class="uk-form-label">{{ 'Show link to blog' | trans }}</label>
                <div class="uk-form-controls">
                    <select id="form-show_bloglink" v-model="widget.data.show_bloglink" class="uk-form-width-medium" number>
                        <option value="1">{{ 'Yes' | trans }}</option>
                        <option value="0">{{ 'No' | trans }}</option>
                    </select>
                </div>
            </div>

            <div v-show="widget.data.show_bloglink == 1" class="uk-form-row">
                <label for="form-bloglink_text" class="uk-form-label">{{ 'Link text' | trans }}</label>
                <div class="uk-form-controls">
                    <input id="form-bloglink_text" class="uk-form-width-large" type="text" name="title" v-model="widget.data.bloglink_text">
                </div>
            </div>

        </div>
        <div class="pk-width-sidebar pk-width-sidebar-large">

            <partial name="settings"></partial>

        </div>
    </div>

</template>

<script>


    module.exports = {

        section: {
            label: 'Settings'
        },

        replace: false,

        props: ['widget', 'config', 'form'],

        created: function () {
            this.$options.partials = this.$parent.$options.partials;
            this.$set('widget.data', _.merge({
                view: 'list',
                count: 5,
                show_image: 'side',
                cols: 3,
                panel_class: '',
                show_meta: 1,
                show_readmorelink: 1,
                readmore_text: 'Read more',
                show_bloglink: 1,
                bloglink_text: 'All blog posts',
                content_length: 0
            }, this.widget.data));
        }
    };

    window.Widgets.components['bixie-blogposts:settings'] = module.exports;

</script>
