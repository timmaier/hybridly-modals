<script setup lang="ts">
const { show, close, unmount } = useDialog()

defineProps<{
  title?: string
}>()
</script>

<template>
	<headless-transition-root
    appear
    as="template"
    :show="show"
    @after-leave="unmount"
  >
		<headless-dialog
      as="div"
      class="relative z-30"
      @close="close"
    >
			<headless-transition-child
				as="template"
				enter="ease-out duration-300"
				enter-from="opacity-0"
				enter-to="opacity-100"
				leave="ease-in duration-200"
				leave-from="opacity-100"
				leave-to="opacity-0"
			>
				<div class="fixed inset-0 bg-gray-500/75 backdrop-blur-sm transition-opacity" />
			</headless-transition-child>

			<div class="fixed inset-0 z-30 overflow-y-auto">
				<div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
					<headless-transition-child
						as="template"
						enter="ease-out duration-100"
						enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
						enter-to="opacity-100 translate-y-0 sm:scale-100"
						leave="ease-in duration-100"
						leave-from="opacity-100 translate-y-0 sm:scale-100"
						leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
					>
						<headless-dialog-panel class="relative overflow-hidden flex flex-col rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-2xl sm:p-6">
							<div class="justify-between flex items-center mb-2">
								<headless-dialog-title v-if="title" as="h3" class="text-lg font-medium leading-6 text-gray-800" v-text="title" />
								<button
									type="button"
									class="rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
									@click="close"
								>
									<span class="sr-only">Close</span>
									<i-mdi-close class="h-6 w-6" aria-hidden="true" />
								</button>
							</div>
							<div class="sm:flex sm:items-start">
								<div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
									<div class="mt-2 w-full">
										<slot />
									</div>
								</div>
							</div>
						</headless-dialog-panel>
					</headless-transition-child>
				</div>
			</div>
		</headless-dialog>
	</headless-transition-root>
</template>