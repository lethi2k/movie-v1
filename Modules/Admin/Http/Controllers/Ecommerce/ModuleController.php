<?php

namespace Modules\Admin\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Layout\Repositories\Interfaces\ExtensionRepositoryInterface;
use Modules\Layout\Repositories\Interfaces\ModuleRepositoryInterface;

class ModuleController extends Controller
{
    private $moduleService;
    private $extensionService;

    public function __construct(
        ModuleRepositoryInterface $moduleService,
        ExtensionRepositoryInterface $extensionService
    ) {
        $this->moduleService = $moduleService;
        $this->extensionService = $extensionService;
    }

    public function create(Request $request, $type)
    {
        $this->moduleService->create($request->all(), $type);

        return redirect()->route('admin.ecommerce.themes.edit', 1);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($type, $module_id)
    {
        $extensions = [];
        $module = $this->moduleService->detail($module_id);
        $settings = json_decode($module->setting);

        if ($type == 'filter') {
            $data = $this->extensionService->initModule($type, $module_id);
            $extensions = $data['extensions'];
        }

        $curent_product = isset($settings->product->value) ? $settings->product->value : [];
        $curent_product_category = isset($settings->product->category) ? $settings->product->category : [];
        $curent_category = isset($settings->category_product->value) ? $settings->category_product->value : [];

        $curent_new = isset($settings->new->value) ? $settings->new->value : [];
        $curent_new_category = isset($settings->new->category) ? $settings->new->category : [];
        $curent_category_new = isset($settings->category_new->value) ? $settings->category_new->value : [];

        // dd($settings->product->category);
        // dd($type, $module_id, $settings, $extensions);
        return view(
            'admin::ecommerce.themes.module.edit_' . $type,
            compact(
                'module',
                'settings',
                'type',
                'extensions',
                'curent_product',
                'curent_product_category',
                'curent_category',
                'curent_new',
                'curent_new_category',
                'curent_category_new'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type, $module)
    {
        $this->moduleService->update($request->all(), $type, $module);

        return redirect()->back()->with('success', 'Module updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($type, $module_id)
    {
        $this->moduleService->destroy($module_id);

        return redirect()->back()->with('success', 'Module deleted successfully');
    }
}
