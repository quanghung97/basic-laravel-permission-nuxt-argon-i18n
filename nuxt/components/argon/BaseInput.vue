<template>
  <div
    :class="[
      {'input-group': hasIcon},
      {'has-danger': error},
      {'focused': focused},
      {'input-group-alternative': alternative},
      {'has-label': label || $slots.label},
      {'has-success': valid === true},
      {'has-danger': valid === false}
    ]"
    class="form-group"
  >
    <slot name="label">
      <label v-if="label" :class="labelClasses">
        {{ label }}
        <span v-if="required">*</span>
      </label>
    </slot>

    <div v-if="addonLeftIcon || $slots.addonLeft" class="input-group-prepend">
      <span class="input-group-text">
        <slot name="addonLeft">
          <i :class="addonLeftIcon"></i>
        </slot>
      </span>
    </div>
    <slot v-bind="slotData">
      <input
        :value="value"
        :class="[{'is-valid': valid === true}, {'is-invalid': valid === false}, inputClasses]"
        v-bind="$attrs"
        class="form-control"
        aria-describedby="addon-right addon-left"
        v-on="listeners"
      >
    </slot>
    <div v-if="addonRightIcon || $slots.addonRight" class="input-group-append">
      <span class="input-group-text">
        <slot name="addonRight">
          <i :class="addonRightIcon"></i>
        </slot>
      </span>
    </div>
    <slot name="infoBlock"></slot>
    <slot name="helpBlock">
      <div
        v-if="error"
        :class="{'mt-2': hasIcon}"
        class="text-danger invalid-feedback"
        style="display: block;"
      >{{ error }}</div>
    </slot>
  </div>
</template>
<script>
export default {
  name: 'base-input',
  inheritAttrs: false,
  props: {
    required: {
      type: Boolean,
      description: 'Whether input is required (adds an asterix *)',
      default: true
    },
    valid: {
      type: Boolean,
      description: 'Whether is valid',
      default: undefined
    },
    alternative: {
      type: Boolean,
      description: 'Whether input is of alternative layout',
      default: true
    },
    label: {
      type: String,
      description: 'Input label (text before input)',
      default: undefined
    },
    error: {
      type: String,
      description: 'Input error (below input)',
      default: undefined
    },
    labelClasses: {
      type: String,
      description: 'Input label css classes',
      default: undefined
    },
    inputClasses: {
      type: String,
      description: 'Input css classes',
      default: undefined
    },
    value: {
      type: [String, Number],
      description: 'Input value',
      default: undefined
    },
    addonRightIcon: {
      type: String,
      description: 'Addon right icon',
      default: undefined
    },
    addonLeftIcon: {
      type: String,
      description: 'Addont left icon',
      default: undefined
    }
  },
  data() {
    return {
      focused: false
    }
  },
  computed: {
    listeners() {
      return {
        ...this.$listeners,
        input: this.updateValue,
        focus: this.onFocus,
        blur: this.onBlur
      }
    },
    slotData() {
      return {
        focused: this.focused,
        ...this.listeners
      }
    },
    hasIcon() {
      const { addonRight, addonLeft } = this.$slots
      return (
        addonRight !== undefined ||
        addonLeft !== undefined ||
        this.addonRightIcon !== undefined ||
        this.addonLeftIcon !== undefined
      )
    }
  },
  methods: {
    updateValue(evt) {
      let value = evt.target.value
      this.$emit('input', value)
    },
    onFocus(value) {
      this.focused = true
      this.$emit('focus', value)
    },
    onBlur(value) {
      this.focused = false
      this.$emit('blur', value)
    }
  }
}
</script>
<style>
</style>
