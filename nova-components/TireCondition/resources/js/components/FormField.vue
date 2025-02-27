<template>
  <DefaultField
    :field="field"
    :errors="errors"
    :show-help-text="showHelpText"
    :full-width-content="fullWidthContent"
  >
    <template #field>
        <div class="flex items-center">
            <SearchInput
                v-if="useSearchInput"
                v-model="selectedResourceId"
                @selected="selectResource"
                @input="performResourceSearch"
                @clear="clearResourceSelection"
                :options="filteredResources"
                :has-error="hasError"
                :debounce="currentField.debounce"
                :disabled="currentlyIsReadonly"
                :clearable="
                    currentField.nullable ||
                    editingExistingResource ||
                    viaRelatedResource ||
                    createdViaRelationModal
                "
                trackBy="value"
                :mode="mode"
                :autocomplete="currentField.autocomplete"
                class="w-full"
                :dusk="`${field.resourceName}-search-input`"
            >
                <div v-if="selectedResource" class="flex items-center">
                    <div v-if="selectedResource.avatar" class="mr-3">
                        <img
                            :src="selectedResource.avatar"
                            class="w-8 h-8 rounded-full block"
                        />
                    </div>

                    {{ selectedResource.display }}
                </div>

                <template #option="{ selected, option }">
                    <SearchInputResult
                        :option="option"
                        :selected="selected"
                        :with-subtitles="currentField.withSubtitles"
                    />
                </template>
            </SearchInput>

            <SelectControl
                v-else
                v-model="selectedResourceId"
                @selected="selectResource"
                :options="availableResources"
                :has-error="hasError"
                :disabled="currentlyIsReadonly"
                label="display"
                class="w-full"
                :dusk="`${field.resourceName}-select`"
            >
                <option value="" selected :disabled="!currentField.nullable">
                    {{ placeholder }}
                </option>
            </SelectControl>
        </div>
    </template>
  </DefaultField>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
  mixins: [FormField, HandlesValidationErrors],

  props: ['resourceName', 'resourceId', 'field'],

  methods: {
    /*
     * Set the initial, internal value for the field.
     */
    setInitialValue() {
      this.value = this.field.value || ''
    },

    /**
     * Fill the given FormData object with the field's internal value.
     */
    fill(formData) {
      formData.append(this.fieldAttribute, this.value || '')
    },
  },
}
</script>
