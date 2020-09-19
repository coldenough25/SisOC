import React, { createContext, useCallback, useState, useContext } from 'react';
import api from '../services/api';

interface AuthState {
  token: string;
  user: object;
}

interface CredentialsData {
  email: string;
  senha: string;
}

interface ContextData {
  user: object;
  signIn(credentials: CredentialsData): Promise<void>;
  signOut(): void;
}

const AuthContext = createContext<ContextData>({} as ContextData);

export const AuthProvider: React.FC = ({ children }) => {
  const [data, setData] = useState<AuthState>(() => {
    const token = localStorage.getItem('@Sisoc:token');
    const user = localStorage.getItem('@Sisoc:user');

    if (token && user) return { token, user: JSON.parse(user) };
    return {} as AuthState;
  });

  const signIn = useCallback(async ({ email, senha }) => {
    const response = await api.post('/sessao', { email, senha });
    const { token, user } = response.data;

    localStorage.setItem('@Sisoc:token', token);
    localStorage.setItem('@Sisoc:user', JSON.stringify(user));

    setData({ token, user });
  }, []);

  const signOut = useCallback(() => {
    localStorage.remove('@Sisoc:token');
    localStorage.remove('@Sisoc:user');

    setData({} as AuthState);
  }, []);

  return (
    <AuthContext.Provider value={{ user: data.user, signIn, signOut }}>
      {children}
    </AuthContext.Provider>
  );
};

export function useAuth(): ContextData {
  const context = useContext(AuthContext);
  if (!context) {
    throw new Error('useAuth must be used within an AuthProvider');
  }

  return context;
}
