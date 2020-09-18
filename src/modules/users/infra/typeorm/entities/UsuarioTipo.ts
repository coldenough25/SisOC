import { Column, Entity, PrimaryGeneratedColumn } from 'typeorm';

@Entity('usuario_tipo')
export default class UsuarioTipo {
  @PrimaryGeneratedColumn()
  id: string;

  @Column()
  nome: string;

  @Column()
  descricao: string;
}
