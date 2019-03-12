<template>
  <div class="progress-wrapper">
    <div :class="`progress-${type}`">
      <div class="progress-label">
        <slot name="label">
          <span>{{ label }}</span>
        </slot>
      </div>
      <div class="progress-percentage">
        <slot>
          <span>{{ value }}%</span>
        </slot>
      </div>
    </div>
    <div :style="`height: ${height}px`" class="progress">
      <div
        :class="computedClasses"
        :aria-valuenow="value"
        :style="`width: ${value}%;`"
        class="progress-bar"
        role="progressbar"
        aria-valuemin="0"
        aria-valuemax="100"
      ></div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'base-progress',
  props: {
    striped: {
      type: Boolean,
      description: 'Whether progress is striped',
      default: true
    },
    animated: {
      type: Boolean,
      description:
        'Whether progress is animated (works only with `striped` prop together)',
      default: true
    },
    label: {
      type: String,
      description: 'Progress label (shown on the left above progress)',
      default: undefined
    },
    height: {
      type: Number,
      default: 8,
      description: 'Progress line height'
    },
    type: {
      type: String,
      default: 'default',
      description: 'Progress type (e.g danger, primary etc)'
    },
    value: {
      type: Number,
      default: 0,
      validator: value => {
        return value >= 0 && value <= 100
      },
      description: 'Progress value'
    }
  },
  computed: {
    computedClasses() {
      return [
        { 'progress-bar-striped': this.striped },
        { 'progress-bar-animated': this.animated },
        { [`bg-${this.type}`]: this.type }
      ]
    }
  }
}
</script>
<style>
</style>
