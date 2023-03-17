    /**
     * Affiche le dashboard de l'administrateur
     *
     */
    public function showDashboardAdmin() {
        return view('admin.dashboard', [
            'user_admin' => User::withTrashed()->where('privilege_id', 1)->orderByRaw('deleted_at IS NULL ASC, deleted_at ASC')->get(),
            'articles' => Article::all(),
            'activities' => Activity::all(),
            'reservations' => Reservation::all(),
            'user_public' => User::withTrashed()->where('privilege_id', 2)->orderByRaw('deleted_at IS NULL ASC, deleted_at ASC')->get()
        ]);
    }

    public function block($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin')
            ->with('user-blocked-success', 'User has been blocked successfully');
    }
