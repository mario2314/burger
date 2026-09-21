<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NavItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route as RouteFacade;

class NavItemController extends Controller
{
    public function index()
    {
        $navItems = NavItem::orderBy('sort_order')->get();
        return view('admin.nav-items.index', compact('navItems'));
    }

    public function create()
    {
        $availableRoutes = $this->getPublicRoutes();
        return view('admin.nav-items.create', compact('availableRoutes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'label'      => 'required|string|max:255',
            'route_name' => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        NavItem::create($request->all());

        return redirect()->route('admin.nav-items.index')->with('success', 'Menu navbar berhasil ditambahkan.');
    }

    public function edit(NavItem $navItem)
    {
        $availableRoutes = $this->getPublicRoutes();
        return view('admin.nav-items.edit', compact('navItem', 'availableRoutes'));
    }

    public function update(Request $request, NavItem $navItem)
    {
        $request->validate([
            'label'      => 'required|string|max:255',
            'route_name' => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $navItem->update($request->all());

        return redirect()->route('admin.nav-items.index')->with('success', 'Menu navbar berhasil diupdate.');
    }

    public function destroy(NavItem $navItem)
    {
        $navItem->delete();
        return redirect()->route('admin.nav-items.index')->with('success', 'Menu navbar berhasil dihapus.');
    }

    private function getPublicRoutes()
    {
        return collect(RouteFacade::getRoutes())->filter(function ($route) {
            return in_array('GET', $route->methods())
                && $route->getName()
                && !str_starts_with($route->getName(), 'admin.')
                && !in_array($route->getName(), [
                    'login', 'register', 'logout',
                    'password.request', 'password.email',
                    'password.reset', 'password.store',
                    'verification.notice', 'verification.verify',
                    'verification.send', 'password.confirm',
                    'storage.local'
                ]);
        })->pluck('name')->unique()->sort()->values();
    }
}