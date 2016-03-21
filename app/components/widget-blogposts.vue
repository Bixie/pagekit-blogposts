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
                <label for="form-count" class="uk-form-label">{{ 'Count' | trans }}</label>
                <div class="uk-form-controls">
                    <input id="form-count" class="uk-form-width-small uk-text-right" type="number" name="title"
                           v-model="widget.data.count" min="0" number>
                </div>
            </div>

            <div class="uk-form-row">
                <label for="form-content_length" class="uk-form-label">{{ 'Content length' | trans }}</label>
                <div class="uk-form-controls">
                    <input id="form-content_length" class="uk-form-width-small uk-text-right" type="number" name="title"
                           v-model="widget.data.content_length" min="0" number>
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
                count: 5,
                content_length: 0
            }, this.widget.data));
        }
    };

    window.Widgets.components['bixie-blogposts:settings'] = module.exports;

</script>
